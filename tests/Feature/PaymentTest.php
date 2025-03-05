<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Makanan;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;

class PaymentTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::first(); // Menggunakan user pertama yang ada di database
    }

    public function test_process_payment()
    {
        $this->actingAs($this->user);

        $makanan = Makanan::where('stock', '>', 0)->first();
        $quantity = 1;

        $response = $this->post(route('transactions.process'), [
            'makanan_id' => $makanan->id,
            'quantity' => $quantity,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('transactions', [
            'user_id' => $this->user->id,
            'status' => 'pending',
        ]);
    }

    public function test_callback_updates_transaction_status()
    {
        $this->actingAs($this->user); // Pastikan user login

        $transaction = Transaction::where('status', 'pending')->first();

        $signatureKey = hash("sha512", $transaction->order_id . $transaction->status . $transaction->total_amount . config('midtrans.server_key'));

        $response = $this->post(route('transactions.callback'), [
            'order_id' => $transaction->order_id,
            'transaction_status' => 'capture',
            'gross_amount' => $transaction->total_amount,
            'signature_key' => $signatureKey,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('transactions', [
            'order_id' => $transaction->order_id,
        ]);
    }

    public function test_process_payment_fails_with_invalid_data()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('transactions.process'), [
            'makanan_id' => null, // Tidak mengirim makanan_id
            'quantity' => 0,
        ]);

        $response->assertSessionHasErrors(['makanan_id', 'quantity']);
    }

    public function test_pembayaran_gagal_jikastoktidakcukup()
    {
        $this->actingAs($this->user);

        $makanan = Makanan::first();
        $makanan->update(['stock' => 1]); // Set stok hanya 1

        $response = $this->post(route('transactions.process'), [
            'makanan_id' => $makanan->id,
            'quantity' => 5, // Beli lebih dari stok
        ]);

        $response->assertSessionHas('error', 'Stock tidak mencukupi');
    }


    public function test_transaksi_gagal()
    {
        $user = User::first();
        $this->actingAs($user);

        $transaction = Transaction::where('status', 'pending')->first();
        $this->assertNotNull($transaction, "Transaction tidak ditemukan.");

        $signatureKey = hash("sha512", $transaction->order_id . '200' . $transaction->total_amount . config('midtrans.server_key'));

        $response = $this->post(route('transactions.callback'), [
            'order_id' => $transaction->order_id,
            'transaction_status' => 'cancel',
            'gross_amount' => $transaction->total_amount,
            'signature_key' => $signatureKey,
        ]);

        $response->assertStatus(200);
        $transaction->refresh();
        $this->assertDatabaseHas('transactions', [
            'order_id' => $transaction->order_id,
        ]);
    }


    public function test_user_melihat_riwayat_transaksi()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->get(route('transactions.index'));

        $response->assertStatus(200);
        $response->assertViewHas('transaction');
    }

    public function test_status_transaksi_berubah_jika_pembayaran_berhasil()
    {
        $user = User::first();
        $this->actingAs($user);

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'order_id' => 'TRX-34567890',
            'total_amount' => 65000,
            'status' => 'pending',
        ]);

        $signatureKey = hash("sha512", $transaction->order_id . '200' . $transaction->total_amount . config('midtrans.server_key'));

        $response = $this->post(route('transactions.callback'), [
            'order_id' => $transaction->order_id,
            'transaction_status' => 'capture',
            'gross_amount' => $transaction->total_amount,
            'signature_key' => $signatureKey,
        ]);

        $this->assertDatabaseHas('transactions', [
            'order_id' => $transaction->order_id,
            'status' => 'paid',
        ]);
    }

    public function test_transaksi_ditolak_jika_stok_kurang()
    {
        $user = User::first();
        $this->actingAs($user);

        $makanan = Makanan::create([
            'nama_makanan' => 'Nasi Goreng',
            'harga' => 15000,
            'stock' => 2, // Stok hanya 2
        ]);

        $response = $this->post(route('transactions.process'), [
            'makanan_id' => $makanan->id,
            'quantity' => 5, // Pesan lebih banyak dari stok
        ]);

        $response->assertSessionHas('error', 'Stock tidak mencukupi');
    }

    public function test_total_harga_transaksi_benar()
    {
        $user = User::first();
        $this->actingAs($user);

        $makanan = Makanan::create([
            'nama_makanan' => 'Ayam Goreng',
            'harga' => 20000,
            'stock' => 10,
        ]);

        $response = $this->post(route('transactions.process'), [
            'makanan_id' => $makanan->id,
            'quantity' => 3, // Harusnya total harga 60000
        ]);

        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'total_amount' => 60000, // 20000 * 3
        ]);
    }
 



}

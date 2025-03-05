<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Makanan;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MakananTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp(); 

        // Ambil user dengan jenisuser_id = 1 (diasumsikan sebagai admin)
        $this->user = User::where('jenisuser_id', 1)->first();

        if (!$this->user) {
            $this->markTestSkipped('User admin tidak ditemukan di database.');
        }

        $this->actingAs($this->user); // Autentikasi sebagai admin
    }

    public function test_index_page_loads_successfully(): void
    {
        $response = $this->get(route('admin.makanan.index'));
        $response->assertStatus(200);
    }

    public function test_tambahmakanan(): void
    {
        Storage::fake('public');

        $photo = UploadedFile::fake()->image('makanan.jpg');

        $data = [
            'nama_makanan' => 'Nasi Goreng',
            'harga' => 20000,
            'photo' => $photo,
        ];

        $response = $this->post(route('admin.makanan.store'), $data);

        $response->assertRedirect(route('admin.makanan.index'));
        $this->assertDatabaseHas('makanan', ['nama_makanan' => 'Nasi Goreng']);
    }

    public function test_edit_makanan(): void
    {
        $makanan = Makanan::first();

        if (!$makanan) {
            $this->markTestSkipped('Tidak ada data makanan di database.');
        }

        $response = $this->get(route('admin.makanan.edit', $makanan->id));
        $response->assertStatus(200);
    }

    public function test_updatemakanan(): void
    {
        $makanan = Makanan::first();

        if (!$makanan) {
            $this->markTestSkipped('Tidak ada data makanan di database.');
        }

        $data = [
            'nama_makanan' => 'Ayam Bakar',
            'harga' => 25000,
        ];

        $response = $this->put(route('admin.makanan.update', $makanan->id), $data);

        $response->assertRedirect(route('admin.makanan.index'));
        $this->assertDatabaseHas('makanan', ['nama_makanan' => 'Ayam Bakar']);
    }

    public function test_destroymakanan(): void
    {
        $makanan = Makanan::first();

        if (!$makanan) {
            $this->markTestSkipped('Tidak ada data makanan di database.');
        }

        $response = $this->delete(route('admin.makanan.destroy', $makanan->id));

        $response->assertRedirect(route('admin.makanan.index'));
        $this->assertDatabaseMissing('makanan', ['id' => $makanan->id]);
    }
}

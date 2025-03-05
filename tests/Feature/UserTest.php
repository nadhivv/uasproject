<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\JenisUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserTest extends TestCase
{
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        DB::beginTransaction();

        $this->adminUser = User::where('jenisuser_id', 1)->first();

        if (!$this->adminUser) {
            $this->markTestSkipped('Admin tidak ditemukan di database.');
        }

        $this->actingAs($this->adminUser);
    }

    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }

    public function test_tambah_user(): void
    {
        $jenisuser = JenisUser::first();

        if (!$jenisuser) {
            $this->markTestSkipped('Jenis user tidak ditemukan di database.');
        }

        $data = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'jenisuser_id' => $jenisuser->id,
        ];

        $response = $this->post(route('store.users'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'jenisuser_id' => $jenisuser->id,
        ]);
    }

    public function test_edit_user(): void
    {
        $user = User::first();

        if (!$user) {
            $this->markTestSkipped('User tidak ditemukan di database.');
        }

        $response = $this->get(route('edit.users', $user->id));
        $response->assertStatus(200);
    }

    public function test_update_user(): void
    {
        $user = User::first();

        if (!$user) {
            $this->markTestSkipped('User tidak ditemukan di database.');
        }

        $data = [
            'name' => 'Updated User',
            'email' => 'updated@example.com',
            'jenisuser_id' => $user->jenisuser_id,
        ];
 
        $response = $this->put(route('update.users', $user->id), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'name' => 'Updated User',
            'email' => 'updated@example.com',
        ]);
    }

    public function test_delete_user(): void
    {
        $user = User::where('jenisuser_id', '!=', 2)->first(); // Hindari menghapus admin

        if (!$user) {
            $this->markTestSkipped('Tidak ada user non-admin untuk dihapus.');
        }

        $response = $this->delete(route('delete.users', $user->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}

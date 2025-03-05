<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\JenisUser;
use App\Models\Menu;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        DB::beginTransaction();

        // Pastikan admin sudah ada sebelum test dijalankan
        $this->user = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'jenisuser_id' => 1,
        ]);

        Auth::login($this->user);
    }

    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }

    public function test_index_page_can_be_accessed()
    {
        $response = $this->get(route('index'));
        $response->assertStatus(200);
    }

    public function test_store_role()
    {
        $response = $this->post(route('store.role'), [
            'jenis_user' => 'Moderator',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('jenis_user', [
            'jenis_user' => 'Moderator',
        ]);
    } 

    public function test_edit_role()
    {
        // Buat jenis user dengan create_by dan update_by
        $jenisUser = JenisUser::create([
            'jenis_user' => 'Editor',
        ]);

        $response = $this->get(route('edit.role', $jenisUser->id));
        $response->assertStatus(200);
    }

    public function test_update_role()
    {
        // Buat jenis user
        $jenisUser = JenisUser::create([
            'jenis_user' => 'Old Role',
        ]);

        // Update jenis user
        $response = $this->put(route('update.role', $jenisUser->id), [
            'jenis_user' => 'New Role',
            'menu_ids' => [],
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('jenis_user', [
            'id' => $jenisUser->id,
            'jenis_user' => 'New Role',
        ]);
    }

    public function test_delete_role()
    {
        $jenisUser = JenisUser::create([
            'jenis_user' => 'To Be Deleted',
        ]);

        $response = $this->delete(route('delete.role', $jenisUser->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('jenis_user', [
            'id' => $jenisUser->id,
        ]);
    }
}

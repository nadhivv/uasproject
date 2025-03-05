<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuTest extends TestCase
{
   protected function setUp(): void
    {
        parent::setUp();
        DB::beginTransaction();
    }

    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }

    public function test_store_menu()
    {
        $user = User::create([
            'name' => 'Nadhiva',
            'email' => 'nadhiva@example.com',
            'password' => bcrypt('password'),
            'jenisuser_id' => 1,
        ]);
        Auth::login($user);

        $response = $this->post('/admin/menu/add', [
            'menu_name' => 'Test Menu',
            'menu_link' => '/test-menu',
            'menu_icon' => 'icon-test',
            'id_level'  => 1,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('menu', ['menu_name' => 'Test Menu']);
    }

    public function test_update_menu()
    {
        $user = User::create([
            'name' => 'Nadhiva',
            'email' => 'nadhiva@example.com',
            'password' => bcrypt('password'),
            'jenisuser_id' => 1,
        ]);
        Auth::login($user);

        $menu = Menu::create([
            'menu_name' => 'Old Menu',
            'menu_link' => '/old-menu',
            'menu_icon' => 'icon-old',
            'id_level'  => 1,
            'create_by' => $user->name,
            'update_by' => $user->name,
        ]);

        $response = $this->put("/admin/menu/{$menu->id}", [
            'menu_name' => 'Updated Menu',
            'menu_link' => '/updated-menu',
            'menu_icon' => 'icon-updated',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('menu', ['menu_name' => 'Updated Menu']);
    }

    public function test_delete_menu()
    {
        $user = User::create([
            'name' => 'Nadhiva',
            'email' => 'nadhiva@example.com',
            'password' => bcrypt('password'),
            'jenisuser_id' => 1,
        ]);
        Auth::login($user);

        $menu = Menu::create([
            'menu_name' => 'Menu to be deleted',
            'menu_link' => '/delete-menu',
            'menu_icon' => 'icon-delete',
            'id_level'  => 1,
            'create_by' => $user->name,
            'update_by' => $user->name,
        ]);

        $response = $this->delete("/admin/menu/{$menu->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('menu', ['id' => $menu->id]);
    }
}

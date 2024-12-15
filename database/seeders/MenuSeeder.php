<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu')->insert([
            [
                'menu_name' => 'Dashboard',
                'menu_link' => '/admin/dashboard',
                'menu_icon' => 'icon-grid menu-icon',
                'create_by' => 'system',
                'update_by' => 'system',
            ],
            [
                'menu_name' => 'Daftar User',
                'menu_link' => '/admin/user',
                'menu_icon' => '',
                'create_by' => 'system',
                'update_by' => 'system',
            ],
            [
                'menu_name' => 'Activity',
                'menu_link' => '/admin/useractivity',
                'menu_icon' => '',
                'create_by' => 'system',
                'update_by' => 'system',
            ],
            [
                'menu_name' => 'Add Role',
                'menu_link' => '/admin/role',
                'menu_icon' => 'icon-grid menu-icon',
                'create_by' => 'system',
                'update_by' => 'system',
            ],
            [
                'menu_name' => 'Menu',
                'menu_link' => '/admin/menu',
                'menu_icon' => 'icon-grid menu-icon',
                'create_by' => 'system',
                'update_by' => 'system',
            ],

        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'password' => Hash::make('1234'), // Encrypting the password
                'email' => 'admin@gmail.com',
                'jenisuser_id' => 1,
                'create_by' => 'system',
                'update_by' => 'system',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_user' => 'User',
                'password' => Hash::make('1234'),
                'email' => 'user@gmail.com',
                'jenisuser_id' => 2,
                'create_by' => 'system',
                'update_by' => 'system',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

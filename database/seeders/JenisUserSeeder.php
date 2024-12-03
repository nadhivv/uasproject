<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenis_user')->insert([
            [
                'jenis_user' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_user' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}

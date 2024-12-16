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
                'create_by' => 'system',
                'delete_mark' => 'N',
                'update_by' => 'system',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_user' => 'user',
                'create_by' => 'system',
                'delete_mark' => 'N',
                'update_by' => 'system',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}

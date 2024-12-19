<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jenis_user', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_user');
            $table->string('create_by', 30);
            $table->string('delete_mark', 1)->nullable();
            $table->string('update_by', 30);
            $table->timestamps();
        });

        // DB::table('jenis_user')->insert([
        //     ['id' => 1, 'jenis_user' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
        //     ['id' => 2, 'jenis_user' => 'User', 'created_at' => now(), 'updated_at' => now()],
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_user');
    }
};

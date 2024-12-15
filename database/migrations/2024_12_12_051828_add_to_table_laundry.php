<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('laundry', function (Blueprint $table) {
            $table->decimal('jumlah', 10, 2);
            $table->dateTime('waktu_pengambilan');
            $table->dateTime('waktu_pengembalian');
            $table->enum('status', ['Menunggu', 'Proses', 'Selesai'])->default('Menunggu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laundry', function (Blueprint $table) {
            //
        });
    }
};

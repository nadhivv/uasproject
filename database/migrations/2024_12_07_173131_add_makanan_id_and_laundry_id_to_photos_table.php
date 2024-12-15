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
        Schema::table('photos', function (Blueprint $table) {
            $table->unsignedBigInteger('makanan_id')->nullable()->after('id'); // Buat kolom makanan_id
            $table->unsignedBigInteger('laundry_id')->nullable()->after('makanan_id'); // Buat kolom laundry_id
            $table->foreign('makanan_id')->references('id')->on('makanan')->onDelete('cascade');
            $table->foreign('laundry_id')->references('id')->on('laundry')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign(['makanan_id']);
            $table->dropForeign(['laundry_id']);
            $table->dropColumn(['makanan_id', 'laundry_id']);
        });
    }
};

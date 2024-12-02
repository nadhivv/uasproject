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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('makanan_id')->nullable()->constrained('makanan')->onDelete('set null');
            $table->foreignId('laundry_id')->nullable()->constrained('laundry')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['makanan_id']);
            $table->dropColumn('makanan_id');
            $table->dropForeign(['laundry_id']);
            $table->dropColumn('laundry_id');
        });
    }
};

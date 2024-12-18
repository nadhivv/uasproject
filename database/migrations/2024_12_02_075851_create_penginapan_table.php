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
        Schema::create('penginapan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->float('rating')->default(0);
            $table->string('image_url')->nullable();
            $table->date('available_from')->nullable();
            $table->date('available_to')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penginapan');
    }
};

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('penginapan_id')->constrained('penginapan')->onDelete('cascade');
            $table->enum('type', ['food', 'laundry']);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamp('order_date')->useCurrent();
            $table->enum('status', ['processing', 'completed'])->default('processing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

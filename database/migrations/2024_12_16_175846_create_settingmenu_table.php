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
        Schema::create('settingmenu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenisuser_id')->constrained('jenis_user');
            $table->foreignId('menu_id')->constrained('menu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settingmenu');
    }
};
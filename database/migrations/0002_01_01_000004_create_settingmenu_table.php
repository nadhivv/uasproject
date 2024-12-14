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
            $table->unsignedBigInteger('jenisuser_id');
            $table->unsignedBigInteger('menu_id');
            $table->string('create_by', 30)->default('system');
            $table->string('delete_by', 1)->default('N');
            $table->string('update_by', 30)->nullable();
            $table->timestamps();

            $table->foreign('jenisuser_id')->references('id')->on('jenis_user');
            $table->foreign('menu_id')->references('id')->on('menu');
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

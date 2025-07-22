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
        Schema::create('sw_menu', function (Blueprint $table) {
            $table->id('id_menu');
            $table->unsignedInteger('mnu_padre')->nullable();
            $table->string('mnu_texto', 32);
            $table->string('mnu_url', 64);
            $table->string('mnu_icono', 25)->nullable();
            $table->unsignedInteger('mnu_orden')->default(1);
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sw_menu');
    }
};

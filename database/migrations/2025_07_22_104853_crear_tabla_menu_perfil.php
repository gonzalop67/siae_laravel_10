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
        Schema::create('sw_menu_perfil', function (Blueprint $table) {
            $table->unsignedBigInteger('id_menu');
            $table->foreign('id_menu', 'fk_menuperfil_menu')->references('id_menu')->on('sw_menu')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_perfil');
            $table->foreign('id_perfil', 'fk_menuperfil_perfil')->references('id_perfil')->on('sw_perfil')->onDelete('restrict')->onUpdate('restrict');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sw_menu_perfil');
    }
};

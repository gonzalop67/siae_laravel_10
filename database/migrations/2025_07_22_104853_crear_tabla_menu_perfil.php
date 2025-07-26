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
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id', 'fk_menuperfil_menu')->references('id')->on('sw_menu')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('perfil_id');
            $table->foreign('perfil_id', 'fk_menuperfil_perfil')->references('id_perfil')->on('sw_perfil')->onDelete('restrict')->onUpdate('restrict');
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

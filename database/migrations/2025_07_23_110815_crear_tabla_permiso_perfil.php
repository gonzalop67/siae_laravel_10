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
        Schema::create('sw_permiso_perfil', function (Blueprint $table) {
            $table->unsignedBigInteger('id_permiso');
            $table->foreign('id_permiso', 'fk_permisoperfil_permiso')->references('id_permiso')->on('sw_permiso')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('id_perfil');
            $table->foreign('id_perfil', 'fk_permisoperfil_perfil')->references('id_perfil')->on('sw_perfil')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sw_permiso_perfil');
    }
};

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
        // Schema::create('sw_usuario', function (Blueprint $table) {
        //     $table->increments('id_usuario');
        //     $table->string('us_titulo', 8)->nullable();
        //     $table->string('us_titulo_descripcion', 96)->nullable();
        //     $table->string('us_apellidos', 32);
        //     $table->string('us_nombres', 32);
        //     $table->string('us_shortname', 45)->nullable();
        //     $table->string('us_fullname', 64)->nullable();
        //     $table->string('us_username', 24);
        //     $table->string('us_password', 64);
        //     $table->string('us_foto', 100)->nullable();
        //     $table->string('us_genero', 1)->nullable();
        //     $table->tinyInteger('us_activo');
        // });

        Schema::create('sw_usuario', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 5);
            $table->string('apellidos', 32);
            $table->string('nombres', 32);
            $table->string('shortname', 45);
            $table->string('fullname', 64);
            $table->string('login', 24);
            $table->string('password', 100);
            $table->string('foto', 100);
            $table->string('genero', 1);
            $table->tinyInteger('activo');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sw_usuario', function (Blueprint $table) {
            //
        });
    }
};

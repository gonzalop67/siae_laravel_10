<?php

namespace App\Console\Commands;

use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Instalador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siae_laravel:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando ejecuta el instalador inicial del proyecto';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->verificarPerfilSuperAdmin()) {
            $this->error('El perfil Super Administrador ya existe.');
            return;
        } else {
            $perfil = $this->crearPerfilSuperAdmin();
            $usuario = $this->crearUsuarioSuperAdmin();
            $usuario->perfiles()->attach($perfil); // Relacionar el usuario con el perfil creado
            $this->line('Perfil Super Administrador creado exitosamente.');
        }
    }

    private function crearPerfilSuperAdmin()
    {
        if ($this->verificarPerfilSuperAdmin()) {
            $this->error('El perfil Super Administrador ya existe.');
            return;
        } else {
            $rol = "Super Administrador";
            return Perfil::create([
                'pe_nombre' => 'Super Administrador',
                'pe_slug' => Str::slug($rol, '_')
            ]);
        }
    }

    private function verificarPerfilSuperAdmin()
    {
        return Perfil::where('pe_nombre', 'Super Administrador')->first();
    }

    private function crearUsuarioSuperAdmin()
    {
        return Usuario::create([
            'us_titulo' => 'Ing.',
            'us_titulo_descripcion' => 'Ingeniero en Sistemas',
            'us_apellidos' => 'Peñaherrera Escobar',
            'us_nombres' => 'Gonzalo Nicolás',
            'us_shortname' => 'Ing. Gonzalo Peñaherrera',
            'us_fullname' => 'Peñaherrera Escobar Gonzalo Nicolás',
            'us_username' => 'SuperAdministrador',
            'email' => 'chalo_quito@hotmail.com',
            'password' => Hash::make('Gp67M24e$'),
            'us_foto' => 'gonzalofoto.jpg',
            'us_genero' => 'M',
            'us_activo' => 1
        ]);
    }
}

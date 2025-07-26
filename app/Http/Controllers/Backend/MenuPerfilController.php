<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Menu;
use App\Models\Backend\Perfil;
use Illuminate\Http\Request;

class MenuPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfiles = Perfil::orderBy('id_perfil')->get();
        $menus = Menu::getMenu();
        $menusPerfiles = Menu::with('perfiles')->get()->pluck('perfiles', 'id')->toArray();
        return view('theme.back.menu-perfil.index', compact('perfiles', 'menus', 'menusPerfiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(Request $request)
    {
        if ($request->ajax()) {
            $menu = Menu::findOrFail($request->menu_id);
            if ($request->estado == 1) {
                $menu->perfiles()->attach($request->perfil_id);
                return response()->json(['respuesta' => 'El rol se asignó correctamente.']);
            } else {
                $menu->perfiles()->detach($request->perfil_id);
                return response()->json(['respuesta' => 'El rol se eliminó correctamente.']);
            }
        } else {
            abort(404);
        }
    }
}

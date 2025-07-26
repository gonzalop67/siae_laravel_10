<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "sw_menu";

    protected $guarded = [];
    public $timestamps = false;

    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'sw_menu_perfil', 'menu_id', 'perfil_id');
    }

    private function getMenuPadres($front)
    {
        if ($front) {
            return $this->whereHas('perfiles', function ($query) {
                $query->where('id_perfil', session('id_perfil'))->orderby('mnu_padre');
            })->orderby('mnu_padre')
                ->orderby('mnu_orden')
                ->get()
                ->toArray();
        } else {
            return $this->orderby('mnu_padre')
                ->orderby('mnu_orden')
                ->get()
                ->toArray();
        }
    }

    private function getMenuHijos($padres, $line)
    {
        $hijos = [];
        foreach ($padres as $line2) {
            if ($line['id'] == $line2['mnu_padre']) {
                $hijos = array_merge($hijos, [array_merge($line2, ['submenu' => $this->getMenuHijos($padres, $line2)])]);
            }
        }
        return $hijos;
    }

    public static function getMenu($front = false)
    {
        $menus = new Menu();
        $padres = $menus->getMenuPadres($front);
        $menuAll = [];
        foreach ($padres as $line) {
            if ($line['mnu_padre'] != null)
                break;
            $item = [array_merge($line, ['submenu' => $menus->getMenuHijos($padres, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }

    public static function guardarOrden($menu)
    {
        $menus = json_decode($menu);
        foreach ($menus as $var => $menu) {
            self::where('id', $menu->id)->update(['mnu_padre' => null, 'mnu_orden' => $var + 1]);
            if (!empty($menu->children)) {
                self::guardarOrdenHijos($menu->children, $menu);
            }
        }
    }

    public static function guardarOrdenHijos($hijos, $padre)
    {
        foreach ($hijos as $key => $hijo) {
            self::where('id', $hijo->id)->update(['mnu_padre' => $padre->id, 'mnu_orden' => $key + 1]);
            if (!empty($hijo->children)) {
                self::guardarOrdenHijos($hijo->children, $hijo);
            }
        }
    }
}

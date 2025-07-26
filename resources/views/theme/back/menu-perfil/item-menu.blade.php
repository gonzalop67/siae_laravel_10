<tr>
    <td class="{{$hijo == 'si' ? 'px-4' : 'fw-bold'}}">
        <i class="{{$hijo == 'si' ? 'fas fa-arrow-right' : ''}}"></i> {{$menu["mnu_texto"]}}
    </td>
    @foreach ($perfiles as $perfil)
        <td class="text-center">
            <input
            type="checkbox"
            class="menu_perfil"
            name="menu_perfil[]"
            data-url="{{route('menu-perfil.guardar')}}"
            data-menu = {{$menu["id"]}}
            value="{{$perfil->id_perfil}}"
            {{in_array($perfil->id_perfil, array_column($menusPerfiles[$menu["id"]], "id_perfil")) ? "checked" : ""}}>
        </td>
    @endforeach
</tr>
@foreach ($menu["submenu"] as $key => $hijo)
    @include('theme.back.menu-perfil.item-menu', ['menu' => $hijo, 'hijo' => 'si'])
@endforeach

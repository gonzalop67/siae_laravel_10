@extends('theme.back.app')
@section('titulo')
    Menú Perfil
@endsection

@section('scripts')
    <script src="{{ asset('assets/back/js/pages/scripts/menu-perfil/index.js') }}"></script>
@endsection

@section('contenido')
    <!--begin::Row-->
    <div class="row g-4">
        @csrf
        <!-- Start column -->
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-hover mt-3">
                <thead>
                    <th>Menú</th>
                    @foreach ($perfiles as $perfil)
                        <th class="text-center">{{ $perfil->pe_nombre }}</th>
                    @endforeach
                </thead>
                <tbody>
                    @foreach ($menus as $key => $menu)
                        @if ($menu["mnu_padre"] != null)
                            @break
                        @endif
                        @include('theme.back.menu-perfil.item-menu', ['menu' => $menu, 'hijo' => 'no'])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Row-->
@endsection

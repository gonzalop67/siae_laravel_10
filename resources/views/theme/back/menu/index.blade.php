@extends('theme.back.app')
@section('titulo')
    Menú
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/back/extra-libs/nestable/jquery.nestable.css') }}">
@endsection

@section('scriptsPlugins')
    <script src="{{ asset('assets/back/extra-libs/nestable/jquery.nestable.js') }}"></script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/back/js/pages/scripts/menu/index.js') }}"></script>
@endsection

@section('contenido')
    <!--begin::Row-->
    <div class="row g-4">
        <!-- Start column -->
        <div class="col-lg-12">
            @if ($mensaje = session('mensaje'))
                <x-alert tipo="success" :mensaje="$mensaje" />
            @endif
            <div class="card card-success card-outline mt-3">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="mb-0">Menús<span class="fs-5 fw-light"> Listado </span></h4>
                    </div>
                    <div class="card-tools">
                        <a href="{{ route('menu.crear') }}" class="btn btn-success btn-sm float-sm-end">Crear Menú</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @csrf --}}
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($menus as $key => $item)
                                @if ($item['mnu_padre'] != null)
                                    break;
                                @endif
                                @include('theme.back.menu.menu-item', ['item' => $item])
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Row-->

    <!-- Modal -->
    <div class="modal fade" id="confirmar-eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirme esta acción</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿ Seguro desea eliminar este Menú ? Recuerde que si es menú padre también se eliminarán todos los hijos
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" id="accion-eliminar" class="btn btn-primary">Sí</button>
                </div>
            </div>
        </div>
    </div>
@endsection

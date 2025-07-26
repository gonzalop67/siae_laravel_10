@extends('theme.back.app')
@section('titulo')
    Sistema Menús
@endsection

@section('contenido')
    <!--begin::Row-->
    <div class="row g-4">
        <!-- Start column -->
        <div class="col-lg-12">
            @if ($errors->any())
                <x-alert tipo="danger" :mensaje="$errors" />
            @endif
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="mb-0">Editar Menú</h4>
                    </div>
                    <div class="card-tools">
                        <a href="{{ route('menu') }}" type="button" class="btn btn-primary btn-sm">Volver al Listado</a>
                    </div>
                </div>
                <form id="form-general" action="{{ route('menu.actualizar', $data->id) }}" method="POST">
                    @csrf @method('put')
                    <div class="card-body">
                        @include('theme.back.menu.form')
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Row-->
@endsection

@section('scripts')
    <script src="{{ asset('assets/back/js/pages/scripts/menu/crear.js') }}"></script>
@endsection

@extends('theme.back.app')
@section('titulo')
    Sistema Menús
@endsection

@section('contenido')
    <!--begin::Row-->
    <div class="row g-4">
        <!-- Start column -->
        <div class="col-lg-12">
            @if ($mensaje = session('mensaje'))
                <x-alert tipo="success" :mensaje="$mensaje" />
            @endif
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <div class="card-title">
                        Crear Menús
                    </div>
                </div>
                <form id="form-general" action="{{ route('menu.guardar') }}" method="POST">
                    @csrf
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

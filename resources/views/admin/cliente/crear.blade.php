@extends('layouts.config')
@section('content')
    @include('admin.header')
    <div id="layoutSidenav">
        @include('admin.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="page-header page-header-dark bg-gradient-primary-to-secondary mt-1">
                    <div class="page-header-content">
                        <div class="row justify-content-center">
                            <div class="col-12 col-xl-auto">
                                <h1 class="page-title">
                                    
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body page-body-light pt-3 px-2">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            {{ __('Personal information') }}
                        </div>
                        <main>
                            <!-- Main page content-->
                            <div class="container-xl px-4 mt-4">
                                <hr class="mt-0 mb-4" />
                                <div class="row">
                                    <div class="col-xl-8">
                                        <!-- Account details card-->
                                        <div class="card mb-4">
                                            <div class="card-header">{{ __('Account details') }}</div>
                                            <div class="card-body">
                                                @if (\Session::has('warning'))
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            <li>{{ \Session::get('warning') }}</li>
                                                        </ul>
                                                    </div>
                                                @endif
                                                <label for="dni">{{ __('To write') }} DNI</label>
                                                <!--empiezo  de la reniec-->
                                                <div class="input-group">
                                                    <input type="number" min="1" max="99999999" id="dni"
                                                        class="form-control" placeholder="{{ __('Document') }}" />&nbsp;
                                                    <button class="btn btn-primary" id="buscardni" align="right"
                                                        onClick="consultarDni()">{{ __('Search') }}</button>
                                                </div>
                                                <form action="{{ route('cliente.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <!--search-->
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end py-2 px-4">
                                                    </div>
                                                    <!-- Form Group (username)-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (DNI)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputDNI">DNI</label>
                                                            <input class="form-control" name="documento" id="dni_ciudadano"
                                                                type="text" placeholder="DNI" readonly />
                                                        </div>
                                                        <!-- Form Group (name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1"
                                                                for="inputName">{{ __('Name') }}</label>
                                                            <input class="form-control" name="nombre" id="nombres"
                                                                type="text" placeholder="{{ __('Name') }}"
                                                                readonly />
                                                        </div>
                                                    </div>
                                                    <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (last name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputFirstName">
                                                                {{ __('Fathers last name') }}</label>
                                                            <input class="form-control" name="apellido_paterno"
                                                                id="apellido_paterno" type="text"
                                                                placeholder="{{ __('Fathers last name') }}" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (last name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputFirstName">
                                                                {{ __('Mother last name') }}</label>
                                                            <input class="form-control" name="apellido_materno"
                                                                id="apellido_materno" type="text"
                                                                placeholder="{{ __('Mother last name') }}" readonly />
                                                        </div>
                                                    </div>
                                                    
                                            </div>
                                            <div class="text-center">
                                                <!-- Save changes button-->
                                                <button class="btn btn-primary" type="submit"><em
                                                        class='bx bxs-memory-card'></em>{{ __('Save') }} </button>
                                                <!-- cancel changes button-->
                                            </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
            </main>
        </div>
    </div>
    </div>
    </div>
@endsection
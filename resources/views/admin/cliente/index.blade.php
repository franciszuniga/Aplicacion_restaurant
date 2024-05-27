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
                                    {{ __('Clients') }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body page-body-light pt-3 px-2">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            {{ __('List of Clients') }}
                            <a href='{{route('cliente.create')}}' class="btn btn-primary lift"><em class='bx bxs-package'></em>{{ __('. New Client') }}</a>
                        </div>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{\Session::get('success')}}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="card-body py-2">
                            <table class="table table-sm table-bordered table-hover " id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th> {{ __('DNI') }}</th>
                                        <th>{{ __('NOMBRE') }}</th>
                                        <th>{{ __('APELLIDOS') }}</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $clie)
                                    <tr>
                                        
                                        <td>{{$clie->documento}}</td>
                                        <td>{{$clie->nombre}}</td>
                                        <td>{{$clie->apellido_paterno}}  {{$clie->apellido_materno}}</td>
                                        <td>
                                            <form action="{{route('cliente.destroy',$clie->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm lift" type="submit" onclick="return confirm('seguro que desea eliminar este usuario?');"><em class='bx bx-trash' ></em></button>
                                            </form>

                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
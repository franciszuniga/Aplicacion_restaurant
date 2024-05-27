@extends('layouts.config')
@section('content')
@include('admin.header')

<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <br>
       <div class="container">
    
        <a class="btn btn-blue" href="{{route('agregar_producto')}}">
            AGREGAR
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        codigo
                    </th>
                    <th>
                        nombre
                    </th>
                    <th>
                        precio
                    </th>
                    <th>
                        stock
                    </th>
                    <th>
                        descripcion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista_productos as $item)
                    <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>
                            {{$item->codigo}}
                        </td>
                        <td>
                            {{$item->nombre}}
                        </td>
                        <td>
                            {{$item->precio}}
                        </td>
                        <td>
                            {{$item->stock}}
                        </td>
                        <td>
                            {{$item->descripcion}}
                        </td>
                    </tr>
                @endforeach
            </tbody>

           </table>
       </div>

        <hr>
        <footer class="footer-admin mt-auto footer-light">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">CONSTRUCCION DE SOFTWARE 2 2022</div>
                    <div class="col-md-6 text-md-end small">
                        <a href="#!">CONTACTANOS</a>
                        
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
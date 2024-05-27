@extends('layouts.config')
@section('content')
@include('admin.header')

<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <br>
       <div class="container">
    
        <a class="btn btn-blue" href="{{route('crear_mesa')}}">
            crear mesa
        </a>
    <style type="text/css">
         table, th,td {
         border: 1px solid black;
         border-collapse: collapse;
        }
        th,td{
            padding: 10px;
        }
    </style>
        <table class="table">
            <table style="width: 50%">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        NUMERO
                    </th>
                    <th>
                        ESTADO
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista_de_mesas as $item)
                    <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>
                            {{$item->numero}}
                        </td>
                        <td>
                            {{$item->estado}}
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
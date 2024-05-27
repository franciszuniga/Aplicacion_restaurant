@extends('layouts.config')
@section('content')
@include('admin.header')

<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <br>
<form action="{{route('crear_mesass')}}" method="post"> 
    @csrf
    <label class="small mb-1" for="inputNºDEMESAS">Nº DE MESAS</label>
    <input type="text" class="form-control" name="numero">
    <label class="small mb-1" for="inputESTADO">ESTADO</label>
    <select name="estado" id="" class="form-control">
        <option value="ocupado"> ocupado</option>
        <option value="disponible"> disponible</option>
        <option value="reservado"> reservado</option>
    </select>
    <button class="btn btn-danger" type="submit">
        crear

    </button>
</form>
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
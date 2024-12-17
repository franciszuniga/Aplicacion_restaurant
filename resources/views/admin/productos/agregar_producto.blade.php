@extends('layouts.config')
@section('content')
@include('admin.header')

<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <br>
<form action="{{route('agregar_producto')}}" method="post"> 
    @csrf
    <label class="small mb-1" for="inputCODIGO">CODIGO</label>
    <input type="text" class="form-control" name="codigo">
    <label class="small mb-1" for="inputNOMBRE">NOMBRE  (BEBIDA, COMIDA)</label>
    <input type="text" class="form-control" name="nombre">
    <label class="small mb-1" for="inputPRECIO">PRECIO</label>
    <input type="text" class="form-control" name="precio">
    <label class="small mb-1" for="inputSTOCK">STOCK</label>
    <input type="text" class="form-control" name="stock">
    <label class="small mb-1" for="inputDESCRIPCION">DESCRIPCION</label>
    <input type="text" class="form-control" name="descripcion">
    <select name="categoria_id" id="categoria_id">
        <option value="1">BEBIDAS</option>
        <option value="2">COMIDAS</option>
    </select>
    
    <button class="btn btn-danger" type="submit">
        GUARDAR

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
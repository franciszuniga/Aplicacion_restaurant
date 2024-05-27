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
                                    EDITAR MESAS
                                </h1>
                            </div>
                        </div>
                    </div>
                </div> 

                    <div class="container">
                        <div class="row">
                            
                            @foreach($editar_mesas as $mesa)
                      
                       @if($mesa->estado == "disponible")
                       <div class="card" style="width: 12rem;">
                        <img src="{{ asset('imagenes/disponible.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$mesa->numero}}</h5>
                        
                          <a href="#" class="btn btn-primary">RESERVAR</a>
                        </div>
                      </div>
                      
                       @elseif($mesa->estado == "ocupado")
                       <div class="card" style="width: 12rem;">
                        <img src="{{ asset('imagenes/ocupado.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$mesa->numero}}</h5>
                        
                          <a href="#" class="btn btn-primary">EDITAR</a>
                        </div>
                      </div>
                       
                       @elseif($mesa->estado == "reservado")
                       <div class="card" style="width: 12rem;">
                        <img src="{{ asset('imagenes/reservado.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$mesa->numero}}</h5>
                        
                          <a href="#" class="btn btn-primary">PENDIENTE</a>
                        </div>
                      </div>
                       @endif
                       @endforeach 
                        </div>
                       
                      
                    </div>

                   
                </div>
            </main>
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
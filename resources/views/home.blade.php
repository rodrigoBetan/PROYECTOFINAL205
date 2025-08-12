@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        PORTADA
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                  <span class="d-none d-sm-inline">
                    <a href="#" class="btn btn-outline-warning">
                    CAFE STAR
                    </a>
                  </span>
                      <!--   <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                           data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>-->
                             <!--</svg>
                            Create new report
                        </a>-->
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                           data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    
    <div class="row m-3">
    <h3 class="fw-bold fs-4 mb-3"></h3>
    {{-- tarjeta principal --}}
    <div class="card text-bg-primary m-3" style="max-width: 18rem;">
       
        <div class="card-header"><i class="ti ti-shopping-cart me-5"> </i><span> PRODUCTOS</span></div>   
        <div class="card-body">
          <h5 class="card-title">CANTIDAD DE PRODUCTOS</h5>
          <p class="card-text">CREADOS Y ACTIVOS PARA LA DISTRIBUCION</p>
        </div>
              
                </h5>
                <p class="mb-2 fw-bold">
                   
                    <span>TOTAL  = <span class="ms-3">{{ $totalproductos }}</span>
                </p>
            </div>
      
            
            <div class="card text-bg-success m-3" style="max-width: 18rem;">
                <div class="card-header"><i class="ti ti-shopping-bag-edit me-5"> </i><span> PEDIDOS</span></div>             
                <div class="card-body">
                  <h5 class="card-title">CANTIDAD DE PEDIDOS REALIZADOS </h5>
                  <p class="card-text">TOTAL RECAUDADO DE LA VENTA DE PRODUCTOS CAFE STAR</p>
                </div>
                      
                        </h5>
                        <p class="mb-2 fw-bold">
                            <span>CANTIDAD PV= </span>
                            <span class="ms-2">{{ $totalpedidos }}</span>
                            
                            <p class="mb-2 fw-bold">

                            <span>TOTAL DE VENTA  = <span class="ms-3">{{ $totalVentas }}</span>
                        </p>
                    </div>

                    




                    <div class="card text-bg-danger m-3" style="max-width: 18rem;">
                       
                        <div class="card-header"><i class="ti ti-category me-5 "> </i><span> CATEGORIAS</span></div>
                        <div class="card-body">
                          <h5 class="card-title">CANTIDAD DE CATEGORIAS </h5>
                          <p class="card-text">PRODUCIONAS Y ACTUALIZADAS </p>
                        </div>
                              
                                </h5>
                                <p class="mb-2 fw-bold ">
                                
                                    <span>TOTAL  = <span class="ms-3">{{$totalCategoria }}</span>
                                </p>
                            </div>

                            
                            {{-- Etiqueta QR --}}
                            <div class="qr-etiqueta" style="text-align: center; margin-top: 20px;">
    <h4>Escanea para abrir el sistema</h4>
    {!! QrCode::size(180)->margin(2)->generate(url('/')) !!}
</div>



@endsection

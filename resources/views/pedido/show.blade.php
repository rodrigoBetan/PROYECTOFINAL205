@extends('tablar::page')

@section('title', 'View Pedido')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        View
                    </div>
                    <h2 class="page-title">
                        {{ __('Pedido ') }}
                    </h2>
                </div>
               <!-- Botones de acciones -->
<div class="col-12 col-md-auto ms-auto d-print-none">
    <div class="btn-list">

        {{-- Botón PDF automático --}}
        <a href="{{ route('pedidos.pdf', $pedido->id) }}" class="btn btn-danger d-none d-sm-inline-block">
            📄 Descargar PDF
        </a>

        {{-- Botón Imprimir DESACTIVADO  --}}
        <!--<a href="#" onclick="window.print()" class="btn btn-warning d-none d-sm-inline-block">
            🖨 Imprimir
        </a>-->


        {{-- Botón Lista de Pedidos --}}
        <a href="{{ route('pedidos.index') }}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Pedido List
        </a>
    </div>
</div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    @if(config('tablar','display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pedido Details</h3>
                        </div>
                        <div class="card-body">
                            
<div class="form-group">
<strong>Subtotal:</strong>
{{ $pedido->Subtotal }}
</div>
<div class="form-group">
<strong>Impuesto:</strong>
{{ $pedido->Impuesto }}
</div>
<div class="form-group">
<strong>Total:</strong>
{{ $pedido->Total }}
</div>
<div class="form-group">
<strong>Entrega:</strong>
{{ $pedido->Entrega }}
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



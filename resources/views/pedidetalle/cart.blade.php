@extends('tablar::page')

@section('title')
    venta
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        List
                    </div>
                    <h2 class="page-title">
                       {{ __('✔️ Confirmar Pedido ') }}
                    </h2>
                    
                </div>
                <!-- Page title actions -->
               
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            
            <div class="container">
                <div class="col-12">
                    <div class="card">                    
                                                      
                        <div class="table-responsive ">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                   
                                                                      
										<th>id</th>
										<th>nombre</th>
										<th>cantidad</th>
										<th>precio unitario</th>
                                        <th>precio total</th>
										<th>Eliminar Item</th>
                                        <th>Mesa</th>
                                    <th class="w-1"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse (Cart::content() as $product)
                                    <tr>
                                        
                                        
											
											<td>{{ $product->id }}</td>
											<td>{{ $product->name }}</td>
											<td>{{ $product->qty}}</td>
                                            <td>{{number_format( $product->price,2)}}</td>
                                            <td>{{number_format( $product->price* $product->qty,2)}}</td>

                                        <td>
                                                                                    
                                                                                                 
                                                       
                                                        
                                                        <form
                                                            action="{{ route('removeitem',$product->id) }}"
                                                            method="POST">
                                                            @csrf    
                                                            <input type="hidden" name="rowId" value="{{$product->rowId}}">                                                        
                                                            <button type="submit"
                                                                    onclick="if(!confirm(' 🗑️ Confirmar:: Eliminar el Item del Pedido?')){return false;}"
                                                                    class="btn btn-danger btn-sm">
                                                                X
                                                            </button>
                                                            <!-- Botn de la mesa  -->
                                                            <td>
                                                            <select name="mesa" id="mesa-3"> <!-- id único por fila -->
                                                            <option value="1">Mesa 1</option>
                                                             <option value="2">Mesa 2</option>
                                                             <option value="3" selected>Mesa 3</option> <!-- si quieres que la mesa 3 esté seleccionada por defecto -->
                                                             <option value="4">Mesa 4</option>
                                                              <option value="5">Mesa 5</option>
    </select>
  </td>
                                                            
                                                        </form>
                                                    
                                                
                                                
                                           
                                        </td>
                                    </tr>
                                @empty
                                    <td>No Data Found</td>
                                @endforelse
                                </tbody>
                                <tr class="fw-bolder">
                                    <td colspan="3"></td>
                                    <td class="text-end">Subtotal</td>
                                    <td >{{Cart::subtotal()}}</td>


                                </tr>
                                <tr class="fw-bolder">
                                    <td colspan="3"></td>
                                    <td class="text-end">impuesto</td>
                                    <td >{{Cart::tax()}}</td>                                    

                                </tr>
                                <tr class="fw-bolder">
                                    <td colspan="3"></td>
                                    <td class="text-end">Total</td>
                                    <td>{{Cart::total()}}</td>                                    
                               
                            </table>
                        </div>
                       <div class="card-footer">
                        <div class="row">
                        <div class="col-3 text-stard">
                          <a href="{{route('cartstore')}}" class="btn btn-success "> Confirmar Compra</a>
                            
                        </div>
                        <div class="col-3 text-rigth">
                            <a href="{{route('clear')}}" class="btn btn-danger"> Cancelar</a>
                              
                          </div>
                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

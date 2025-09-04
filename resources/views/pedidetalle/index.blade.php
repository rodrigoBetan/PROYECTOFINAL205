@extends('tablar::page')

@section('title')
    Pedidetalle
@endsection

@section('content')
   @include("pedidetalle.msg")
            <div class="row  justify-content-center">
                @forelse ($productos as $item)
                
                <div class="col-lg-3 col-sm-6 col-md-4 border p-5 mt-5 text-center">
                    <div class="card">
                        <img src="/img/{{$item->imagen}}" alt="" class="card-img-top">
                        <div class="card-body">
                    <h1>{{$item->nombre}}</h1>
                    <P>$ {{$item->precio}}</P>
                </div>
                <div class="card-footer">
                    <form action="{{route('add')}}" method="post">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{$item->id}}">
                        <input type="submit" name="btn"  class="btn btn-success" value="Agregar Carrito">
                    </form>
                </div>
                </div>
                </div>
            @empty
                
            @endforelse
            </div>
       
@endsection

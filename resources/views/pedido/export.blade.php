@extends('tablar::page')

@section('content')
<div class="container">
    <h1>Informe de Pedidos Realizados</h1>

    <form action="{{ route('export.pedidos') }}" method="GET">
        <div class="form-group">
            <label for="from">Desde:</label>
            <input type="date" name="from" id="from" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="to">Hasta:</label>
            <input type="date" name="to" id="to" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">
            Exportar a Excel
        </button>
    </form>
</div>
@endsection

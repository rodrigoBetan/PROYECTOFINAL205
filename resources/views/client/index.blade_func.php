@extends('tablar::page')

@section('title')
    Client
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
                        {{ __('Client ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('clients.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear Cliente
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Clientes</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="10" size="3"
                                               aria-label="Invoices count">
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                               aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive min-vh-100">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                                           aria-label="Select all invoices"></th>
                                    <th class="w-1">No.</th>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th class="w-1"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse ($clients as $client)
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select client"></td>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $client->Cedula }}</td>
                                        <td>{{ $client->Nombre }}</td>
                                        <td>{{ $client->Apellido }}</td>
                                        <td>{{ $client->Telefono }}</td>
                                        <td>{{ $client->Correo }}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                           href="{{ route('clients.show',$client->id) }}">
                                                            Vista Previa
                                                        </a>
                                                        <a class="dropdown-item"
                                                           href="{{ route('clients.edit',$client->id) }}">
                                                            Editar
                                                        </a>
                                                        <form
                                                            action="{{ route('clients.destroy',$client->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="if(!confirm('Do you Want to Proceed2?')){return false;}"
                                                                    class="dropdown-item text-red">
                                                                <i class="fa fa-fw fa-trash"></i> Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- 🔹 Botón para consultar pedidos -->
                                            <button class="btn btn-info mt-2" onclick="consultarPedidos({{ $client->id }})">
                                                Ver Pedidos
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="7">No Data Found</td>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {!! $clients->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function consultarPedidos(clienteId) {
        fetch(`/clientes/${clienteId}/pedidos`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    let pedidosInfo = "Pedidos del Cliente:\n";
                    data.forEach(pedido => {
                        pedidosInfo += `ID Pedido: ${pedido.id}, Total: ${pedido.Total}\n`;
                    });
                    alert(pedidosInfo);
                } else {
                    alert("Este cliente no tiene pedidos.");
                }
            })
            .catch(error => console.error('Error al obtener los pedidos:', error));
    }
</script>
@endsection

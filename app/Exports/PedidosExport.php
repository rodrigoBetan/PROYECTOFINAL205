<?php

namespace App\Exports;

use App\Models\Pedido;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PedidosExport implements FromCollection, WithHeadings, WithMapping
{
    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    //  Obtiene los pedidos con sus relaciones
    public function collection()
    {
        return Pedido::with(['detalles.producto'])
            ->whereBetween('created_at', [$this->from, $this->to])
            ->get();
    }

    //  Define las cabeceras del Excel
    public function headings(): array
    {
        return [
            'ID Pedido',
            'Fecha',
            'Mesa',
            'Subtotal',
            'Impuesto',
            'Total',
            'Producto',
            'Cantidad',
            'Precio Unitario',
            'Precio Total'
        ];
    }

    public function map($pedido): array
{
    $rows = [];

    foreach ($pedido->detalles as $detalle) {
        $rows[] = [
            $pedido->id,
            $pedido->created_at->format('Y-m-d'),
            $pedido->mesa,
            $pedido->Subtotal,
            $pedido->Impuesto,
            $pedido->Total,
            $detalle->producto->nombre ?? 'N/A',
            $detalle->Cantidad ?? 0, // 👈 Usa el nombre real de la columna
            $detalle->Precio_Total ?? 0, // 👈 Usa la columna real de la tabla
            $detalle->Cantidad * ($detalle->Precio_Total / max($detalle->Cantidad, 1)), // saca precio unitario
        ];
    }

    return $rows;

}
}
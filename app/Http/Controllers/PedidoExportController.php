<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PedidosExport;
use Maatwebsite\Excel\Facades\Excel;

class PedidoExportController extends Controller
{
    public function exportExcel(Request $request)
    {
        $from = $request->input('from');
        $to   = $request->input('to');
    
        return Excel::download(new PedidosExport($from, $to), 'pedidos.xlsx');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // arriba del controlador
/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::paginate(10);

        return view('pedido.index', compact('pedidos'))
            ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());

                   
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedido = new Pedido();
        return view('pedido.create', compact('pedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pedido::$rules);

       /* $pedido = Pedido::create($request->all());*/
       $pedido = Pedido::with('detalles.producto')->findOrFail($id);/*pdf*/

        Pedido::create($request->all());/**pdf */
        return redirect()->route('pedidos.index')
            ->with('success', '📋 Lista de Pedidos Creados.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);

        return view('pedido.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);

        return view('pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        request()->validate(Pedido::$rules);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido Actualizado con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id)->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido Eliminado con Exito');
    }

            //pdf
           
            // ✅ Método para generar PDF
   /* public function generarPDF($id)
    {
        $pedido = Pedido::findOrFail($id);

        // Cargar vista PDF
        $pdf = Pdf::loadView('pedido.pdf', compact('pedido'));

        // Descargar el archivo
        return $pdf->download("pedido_{$pedido->id}.pdf");
    }
            */
            public function pedido()
            {
                return $this->belongsTo(Pedido::class, 'pedido_id');
            }
            
            public function producto()
            {
                return $this->belongsTo(Producto::class, 'producto_id');
            }
            
                /**pdf */

                public function generarPDF($id)
    {
        // Cargar el pedido con sus detalles y productos
        $pedido = Pedido::with(['detalles.producto'])->findOrFail($id);

        // Si no hay detalles, mostramos un error más claro
        if ($pedido->detalles->isEmpty()) {
            return back()->with('error', 'Este pedido no tiene productos asociados.');
        }

        // Cargar la vista del PDF y pasar el pedido
        $pdf = Pdf::loadView('pedido.pdf', compact('pedido'));

        // Descargar el archivo con el nombre formateado
        return $pdf->download("pedido_{$pedido->id}.pdf");
    }
}
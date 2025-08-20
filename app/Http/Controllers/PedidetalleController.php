<?php

namespace App\Http\Controllers;

use App\Models\Pedidetalle;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class PedidetalleController
 * @package App\Http\Controllers
 */
class PedidetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        //consulta productos y envia ala vista pedido detalles
        $productos = Product::all();

        return view('pedidetalle.index', compact('productos'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedidetalle = new Pedidetalle();
        return view('pedidetalle.create', compact('pedidetalle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pedidetalle::$rules);

        $pedidetalle = Pedidetalle::create($request->all());

        return redirect()->route('pedidetalles.index')
            ->with('success', 'Pedidetalle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedidetalle = Pedidetalle::find($id);

        return view('pedidetalle.show', compact('pedidetalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedidetalle = Pedidetalle::find($id);

        return view('pedidetalle.edit', compact('pedidetalle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedidetalle $pedidetalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedidetalle $pedidetalle)
    {
        request()->validate(Pedidetalle::$rules);

        $pedidetalle->update($request->all());

        return redirect()->route('pedidetalles.index')
            ->with('success', 'Pedidetalle updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pedidetalle = Pedidetalle::find($id)->delete();

        return redirect()->route('pedidetalles.index')
            ->with('success', 'Pedidetalle deleted successfully');
    }
   

}

<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;

/**
 * Class CategoriController
 * @package App\Http\Controllers
 */
class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoris = Categori::paginate(10);

        return view('categori.index', compact('categoris'))
            ->with('i', (request()->input('page', 1) - 1) * $categoris->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = new Categori();
        return view('categori.create', compact('categori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Categori::$rules);

        $categori = Categori::create($request->all());

        return redirect()->route('categoris.index')
            ->with('success', 'Categori created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categori = Categori::find($id);

        return view('categori.show', compact('categori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori = Categori::find($id);

        return view('categori.edit', compact('categori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categori $categori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categori $categori)
    {
        request()->validate(Categori::$rules);

        $categori->update($request->all());

        return redirect()->route('categoris.index')
            ->with('success', 'Categori updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categori = Categori::find($id)->delete();

        return redirect()->route('categoris.index')
            ->with('success', 'Categori deleted successfully');
    }
}

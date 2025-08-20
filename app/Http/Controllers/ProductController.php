<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Categori;
use Illuminate\Database\Eloquent\Factories\HasFactory;




/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 

     

     public function __construct()
     {
        $this->middleware('auth');
        $this->middleware('can:ver producto index')->only('index');
        $this->middleware('can:crear producto')->only('create','store');
        $this->middleware('can:products.edit')->only('edit','update');
        $this->middleware('can:products.destroy')->only('destroy');
        
         }


         

    public function index()
    {
      
      $products = Product::paginate(10);

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());

            

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
/*
        $categorias = Categori::orderBy('id', 'DESC')
        ->select('id', 'nombre')
        ->get();

     return view('product.create', compact('product','categori'));

    */
    $categoria = Categori::query()->pluck('nombre', 'id')->all();
       $product = new Product();
        return view('product.create', compact('product','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

            $request->validate([
                'nombre'=>'Required',
                'imagen'=>'Required|image|mimes:jpeg,png,jpg,git|max:2048',
                'descripcion'=>'Required',
                'precio'=>'Required',
                'sctock' => 'required|numeric', // ← corregido
               
               

            ]);
    
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
                $imagen->move(public_path('img'), $nombreImagen);
            }
          $product = new Product();
          $product->nombre = $request->nombre;
          $product->descripcion = $request->descripcion;
          $product->precio = $request->precio;
          $product->sctock = $request->sctock;
          $product->imagen = $nombreImagen;
          $product->id_Categoria = $request->categoria;
          $product->save();

          return redirect()->route('products.index')
          ->with('success', 'Product created successfully.');

    
        $imagen->move('img/',$nombreImagen);
     
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
      public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        /*$categoria = Categori::query()->pluck('nombre', 'id')->all();*/
        $categoria = \App\Models\Categori::query()->pluck('nombre', 'id')->toArray();
         

        return view('product.edit', compact('product','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }*/

    public function update(Request $request, Product $product)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric',
        'sctock' => 'required|numeric', // ← igual que en tu DB
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'categoria' => 'required|exists:categoris,id'
    ]);

    // Actualizar datos básicos
    $product->nombre = $request->nombre;
    $product->descripcion = $request->descripcion;
    $product->precio = $request->precio;
    $product->sctock = $request->sctock;
    $product->id_Categoria = $request->categoria;

    // Manejo de imagen
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
        $imagen->move(public_path('img'), $nombreImagen);
        $product->imagen = $nombreImagen;
    }

    $product->save();

    return redirect()->route('products.index')
        ->with('success', 'Producto actualizado correctamente.');
}


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}

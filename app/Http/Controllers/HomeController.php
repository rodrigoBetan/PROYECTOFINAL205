<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\Pedido;
use App\Models\Product;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Importar la clase

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalproductos=count(Product::all());
        $totalpedidos=count(Pedido::all());
        $totalTOTAL=count(Pedido ::all());
        $totalCategoria=count(Categori::all());
        $totalVentas = Pedido::sum('Total');

              // Generar el QR como HTML y pasarlo a la vista
        $qr = QrCode::size(150)->generate('http://127.0.0.1:8000/');

        

        return view('home',compact(['qr','totalproductos','totalpedidos','totalCategoria','totalVentas']));
    }
     

}


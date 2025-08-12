<?php

namespace App\Http\Controllers;

use App\Models\Pedidetalle;
use App\Models\Product;
use App\Models\Pedido;
use Illuminate\Http\Request;

use Cart;
class CartController extends Controller
{
    //
    public function add(Request $request)

    {
        //consulta productos y envia ala vista pedido detalles
        $producto = Product::find($request->producto_id);
       
      Cart::add(
            $producto->id,
            $producto->nombre,
            1,
            $producto->precio
        );
        return redirect()->back()->with("success","Producto_Agregado");
    }

    //muestra la vista del carrito
    public function checkout()

    {
        //consulta productos y envia ala vista pedido detalles
       
        return view("pedidetalle.cart");
    }

     //elimina un item
     public function removeitem(Request $request)

     {
         //consulta productos y envia ala vista pedido detalles
        Cart::remove($request->rowId);
        return redirect()->back()->with("success","item eliminado");
     }
     public function clear()

     {
         //consulta productos y envia ala vista pedido detalles
        Cart::destroy();
        return redirect()->back()->with("success","carrito vacio");
     }

     public function cartstore()

     {
         //guardar  venta en base de datos
         //tabla venta
         $pedido = new Pedido();
         $pedido->Subtotal = Cart::subtotal();
         $pedido->Impuesto = Cart::tax();
         $pedido-> Total= Cart::total();
         $pedido->Entrega = true;
         $pedido->id_user = 2;              
         $pedido->save();
         //guardar datos de pedido detalles
         foreach(Cart::content() as $item){
            $pedidetalle=new Pedidetalle();
            $pedidetalle->Cantidad=$item->qty;
           // $pedidetalle->descuento=0;
            $pedidetalle->Precio_Total= $item->price* $item->qty;
            $pedidetalle->id_pedidos=$pedido->id;									
            $pedidetalle->id_products=$item->id;
            $pedidetalle->save();
         }

         Cart::destroy();
         return redirect()->route('pedidos.index')
            ->with('success', '📋 Lista de Pedidos Creados.');
     }
 

}

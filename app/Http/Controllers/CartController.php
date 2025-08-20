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

     public function cartstore(Request $request)

     {
        $request->validate([
            'mesa' => 'required'
        ]);
         //guardar  venta en base de datos

         // 2) Convertir strings del carrito a números (quitan comas de miles)
        $toDecimal = fn ($s) => (float) str_replace(',', '', $s);

        $subtotal = $toDecimal(Cart::subtotal()); // ej: "3,500.00" -> 3500.00
        $tax      = $toDecimal(Cart::tax());
        $total    = $toDecimal(Cart::total());
        
         //tabla venta
         $pedido = new Pedido();
         $pedido->mesa = $request->mesa;

         $pedido->Subtotal = $toDecimal(Cart::subtotal());
         $pedido->Impuesto = $toDecimal(Cart::tax());
         $pedido->Total    = $toDecimal(Cart::total());
         $pedido->Entrega = true;
         $pedido->id_user = 2;              
         $pedido->save();

         //  Por cada item del carrito descuente
         foreach (Cart::content() as $item) {
            $cantidad = (int) $item->qty;
            // Bloquear el producto para evitar carreras
            $producto = Product::lockForUpdate()->findOrFail($item->id);

            /*if ((int)$producto->sctock < $cantidad) 
                abort(422, "No hay stock suficiente de {$producto->nombre}. Disponible: {$producto->sctock}");*/

               /* if ((int)$producto->sctock < $cantidad) {
                    // Guardar mensaje de error en sesión
                    session()->flash('error', "No hay stock suficiente de {$producto->nombre}. 
                        Disponible: {$producto->sctock}, pero pediste {$cantidad}.");*/
                
         //guardar datos de pedido detalles
         foreach(Cart::content() as $item){
            $pedidetalle=new Pedidetalle();
            $pedidetalle->Cantidad=$item->qty;
           // $pedidetalle->descuento=0;
            $pedidetalle->Precio_Total= $item->price* $item->qty;
            $pedidetalle->id_pedidos=$pedido->id;									
            $pedidetalle->id_products=$item->id;
            $pedidetalle->save();

             // 4.3) Descontar del inventario (columna sctock)
             $producto->sctock = (int)$producto->sctock - $cantidad;
             $producto->save();

             
         }

         Cart::destroy();
         return redirect()->route('pedidos.index')
            ->with('success', '📋 Lista de Pedidos Creados.');
     }
 

}
}

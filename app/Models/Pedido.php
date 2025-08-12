<?php

namespace App\Models;

use App\Http\Controllers\PedidetalleController;
use Illuminate\Database\Eloquent\Model;
use Barryvdh\DomPDF\Facade\Pdf;/**pdf */
    use App\Models\Pedido;/**pdf */

/**
 * Class Pedido
 *
 * @property $id
 * @property $Subtotal
 * @property $Impuesto
 * @property $Total
 * @property $Entrega
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
  protected $table = 'pedidos';/**pdf */
  protected $primaryKey = 'id'; // importante, para que no busque id_pedidos
    public $timestamps = true; // si no usas created_at y updated_at

    static $rules = [
		'Subtotal' => 'required',
		'Impuesto' => 'required',
		'Total' => 'required',
		'Entrega' => 'required',

  
    ];
    protected $casts = [
      'created_at' => 'datetime',
      'updated_at' => 'datetime',
  ];
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Subtotal','Impuesto','Total','Entrega'];
    public function users(){
      return $this->belongsTo(User::class,'id_user');
    }

    public function pedidetalle(){
      /*return $this->hasMany(Pedidetalle::class,'id');*/
      return $this->hasMany(Pedidetalle::class, 'pedido_id');
    }

    //**para dpf */
    
   /* public function generarPDF(Pedido $pedido)
    {
        // Si necesitas cargar relaciones
        $pedido->load('cliente', 'productos');
    
        $pdf = Pdf::loadView('pedido.pdf', compact('pedido'));
        return $pdf->download('pedido-'.$pedido->id.'.pdf');
    }*/
   
   /* public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_clientes');
    }*/

    public function detalles()
    {
      return $this->hasMany(Pedidetalle::class, 'id_pedidos');
    }
}
  /** */
  





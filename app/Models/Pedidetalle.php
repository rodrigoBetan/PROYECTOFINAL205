<?php

namespace App\Models;

/*use Illuminate\Database\Eloquent\Model;*/

/**
 * Class Pedidetalle
 *
 * @property $id
 * @property $Cantidad
 * @property $Precio_Total
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
/*class Pedidetalle extends Model
{
    
    static $rules = [
		'Cantidad' => 'required',
		'Precio_Total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    /*protected $fillable = ['Cantidad','Precio_Total'];
    public function pedidos(){
      return $this->belongsTo(Pedido::class,'id_pedidos');
    }
    public function products(){
      return $this->belongsTo(Product::class,'id_products');
    }*/
    use Illuminate\Database\Eloquent\Model;

class Pedidetalle extends Model
{

  protected $table = 'pedidetalles'; // Nombre exacto de la tabla
  protected $primaryKey = 'id'; // Si tu tabla tiene PK llamada id
  public $timestamps = false; // Si no tiene created_at y updated_at

    // Nombre exacto de la tabla en la base de datos
   /* protected $table = 'pedidetalles';*/

    static $rules = [
        'Cantidad' => 'required',
        'Precio_Total' => 'required',
        
    ];

    protected $perPage = 20;

    protected $fillable = [
        'Cantidad',
        'Precio_Total',
        'pedido_id',
        'producto_id',
       

       /*'id_pedidos',
       'id_products',
       'Cantidad',
       'Precio_Total',
       'Mesa'*/
    ];

      public function pedido()
    {
      return $this->belongsTo(Pedido::class, 'id_pedidos');
    }


    public function producto()
    {
        return $this->belongsTo(Product::class, 'id_products');
    }
     

  }
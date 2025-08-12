<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property $id
 * @property $Cedula
 * @property $Nombre
 * @property $Apellido
 * @property $Telefono
 * @property $Correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model
{
    
   /* static $rules = [
		'Cedula' => 'required',
		'Nombre' => 'required',
		'Apellido' => 'required',
		'Telefono' => 'required',
		'Correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    /*protected $fillable = ['Cedula','Nombre','Apellido','Telefono','Correo'];*/

 
    protected $table = 'clients'; // nombre exacto de la tabla

    protected $fillable = [
        'Cedula',
        'Nombre',
        'Apellido',
        'Telefono',
        'Correo',
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }


}

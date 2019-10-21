<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Restaurantes
 * @package App\Models
 * @version October 21, 2019, 9:42 pm UTC
 *
 * @property string nombre
 * @property string direccion
 * @property string telefono
 * @property string imges
 * @property string descripcion
 */
class Restaurantes extends Model
{
    use SoftDeletes;

    public $table = 'restaurantes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'imges',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'imges' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

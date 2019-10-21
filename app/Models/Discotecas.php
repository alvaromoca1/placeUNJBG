<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discotecas
 * @package App\Models
 * @version October 21, 2019, 9:44 pm UTC
 *
 * @property string nombre
 * @property string direccion
 * @property string telefono
 * @property string descripcion
 * @property string images
 */
class Discotecas extends Model
{
    use SoftDeletes;

    public $table = 'discotecas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'descripcion',
        'images'
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
        'descripcion' => 'string',
        'images' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

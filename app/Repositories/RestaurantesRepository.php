<?php

namespace App\Repositories;

use App\Models\Restaurantes;
use App\Repositories\BaseRepository;

/**
 * Class RestaurantesRepository
 * @package App\Repositories
 * @version October 21, 2019, 9:42 pm UTC
*/

class RestaurantesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'direccion',
        'telefono',
        'imges',
        'descripcion'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Restaurantes::class;
    }
}

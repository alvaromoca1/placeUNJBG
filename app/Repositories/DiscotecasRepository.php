<?php

namespace App\Repositories;

use App\Models\Discotecas;
use App\Repositories\BaseRepository;

/**
 * Class DiscotecasRepository
 * @package App\Repositories
 * @version October 21, 2019, 9:44 pm UTC
*/

class DiscotecasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'direccion',
        'telefono',
        'descripcion',
        'images'
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
        return Discotecas::class;
    }
}

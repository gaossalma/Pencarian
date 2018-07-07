<?php

namespace App\Repositories;

use App\Models\Bahasa;
use InfyOm\Generator\Common\BaseRepository;

class BahasaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'bahasa'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bahasa::class;
    }
}

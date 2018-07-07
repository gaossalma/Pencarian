<?php

namespace App\Repositories;

use App\Models\Destinasi;
use InfyOm\Generator\Common\BaseRepository;

class DestinasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama',
        'deskripsi',
        'longitude',
        'latitude'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Destinasi::class;
    }
}

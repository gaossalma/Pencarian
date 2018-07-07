<?php

namespace App\Repositories;

use App\Models\DestinasiPemandu;
use InfyOm\Generator\Common\BaseRepository;

class DestinasiPemanduRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_pemanduB',
        'id_destinasi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DestinasiPemandu::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\BahasaPemandu;
use InfyOm\Generator\Common\BaseRepository;

class BahasaPemanduRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_pemanduB',
        'id_bahasa'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BahasaPemandu::class;
    }
}

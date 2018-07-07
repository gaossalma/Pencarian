<?php

namespace App\Repositories;

use App\Models\History;
use InfyOm\Generator\Common\BaseRepository;

class HistoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_pemandu',
        'id_destinasi',
        'id_pemanduB'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return History::class;
    }
}

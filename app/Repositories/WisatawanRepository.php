<?php

namespace App\Repositories;

use App\Models\Wisatawan;
use InfyOm\Generator\Common\BaseRepository;

class WisatawanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fullname',
        'email',
        'jenis_kelamin',
        'negara',
        'tanggal_lahir',
        'nomor_tlp',
        'longitude',
        'latitude'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Wisatawan::class;
    }
}

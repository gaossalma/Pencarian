<?php

namespace App\Repositories;

use App\Models\PemanduB;
use InfyOm\Generator\Common\BaseRepository;

class PemanduBRepository extends BaseRepository
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
        'latitude',
        'password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PemanduB::class;
    }
}

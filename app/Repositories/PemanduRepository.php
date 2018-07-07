<?php

namespace App\Repositories;

use App\Models\Pemandu;
use InfyOm\Generator\Common\BaseRepository;

class PemanduRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fullname',
        'email',
        'negara',
        'jenis_kelamin',
        'tanggal_lahir',
        'nomor_tlp',
        'password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pemandu::class;
    }
}

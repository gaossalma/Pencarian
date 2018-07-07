<?php

namespace App\Repositories;

use App\Models\Berita;
use InfyOm\Generator\Common\BaseRepository;

class BeritaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'isi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Berita::class;
    }
}

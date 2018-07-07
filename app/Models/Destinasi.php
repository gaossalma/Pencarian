<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Destinasi
 * @package App\Models
 * @version July 7, 2018, 5:12 am UTC
 */
class Destinasi extends Model
{
    use SoftDeletes;

    public $table = 'destinasis';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'longitude',
        'latitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kode' => 'string',
        'nama' => 'string',
        'deskripsi' => 'string',
        'longitude' => 'double',
        'latitude' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode' => 'required',
        'nama' => 'required',
        'deskripsi' => 'required',
        'longitude' => 'required',
        'latitude' => 'required'
    ];

    
}

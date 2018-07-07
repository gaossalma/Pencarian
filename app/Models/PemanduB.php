<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PemanduB
 * @package App\Models
 * @version July 7, 2018, 5:23 am UTC
 */
class PemanduB extends Model
{
    use SoftDeletes;

    public $table = 'pemandu_bs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fullname' => 'string',
        'email' => 'string',
        'jenis_kelamin' => 'string',
        'negara' => 'string',
        'tanggal_lahir' => 'date',
        'nomor_tlp' => 'string',
        'longitude' => 'double',
        'latitude' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fullname' => 'required',
        'email' => 'required',
        'jenis_kelamin' => 'required',
        'negara' => 'required',
        'tanggal_lahir' => 'required',
        'nomor_tlp' => 'required',
        'longitude' => 'required',
        'latitude' => 'required',
        'password' => 'required'
    ];

    
}

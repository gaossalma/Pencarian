<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pemandu
 * @package App\Models
 * @version July 7, 2018, 5:05 am UTC
 */
class Pemandu extends Model
{
    use SoftDeletes;

    public $table = 'pemandus';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fullname',
        'email',
        'negara',
        'jenis_kelamin',
        'tanggal_lahir',
        'nomor_tlp',
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
        'negara' => 'string',
        'jenis_kelamin' => 'string',
        'tanggal_lahir' => 'date',
        'nomor_tlp' => 'string',
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
        'negara' => 'required',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
        'nomor_tlp' => 'required',
        'password' => 'required'
    ];

    // public function Userame($userame,$password)
    // {
    //     return userame,password;
    // }

    
}

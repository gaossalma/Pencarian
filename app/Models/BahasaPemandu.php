<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BahasaPemandu
 * @package App\Models
 * @version July 7, 2018, 5:26 am UTC
 */
class BahasaPemandu extends Model
{
    use SoftDeletes;

    public $table = 'bahasa_pemandus';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_pemanduB',
        'id_bahasa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_pemanduB' => 'integer',
        'id_bahasa' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_pemanduB' => 'required',
        'id_bahasa' => 'required'
    ];

    
}

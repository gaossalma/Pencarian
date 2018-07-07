<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class History
 * @package App\Models
 * @version July 7, 2018, 5:30 am UTC
 */
class History extends Model
{
    use SoftDeletes;

    public $table = 'histories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_pemandu',
        'id_destinasi',
        'id_pemanduB'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_pemandu' => 'integer',
        'id_destinasi' => 'integer',
        'id_pemanduB' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_pemandu' => 'required',
        'id_destinasi' => 'required',
        'id_pemanduB' => 'required'
    ];

    
}

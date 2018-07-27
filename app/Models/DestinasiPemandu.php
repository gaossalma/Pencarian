<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DestinasiPemandu
 * @package App\Models
 * @version July 7, 2018, 5:27 am UTC
 */
class DestinasiPemandu extends Model
{
    use SoftDeletes;

    public $table = 'destinasi_pemandus';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_pemanduB',
        'id_destinasi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_pemanduB' => 'integer',
        'id_destinasi' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_pemanduB' => 'required',
        'id_destinasi' => 'required'
    ];

    public function destinasi()
    {
        return $this->belongsTo('App\Models\Destinasi','id_destinasi');
    }

     public function pemandu()
    {
        return $this->belongsTo('App\Models\PemanduB','id_pemanduB');
    }    
}

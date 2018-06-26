<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class FileStatus extends Model
{
    use SoftDeletes;

    public $table = 'file_status';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'location_id',
        'status_id',
        'name',
        'user_id',
        'file_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'location_id' => 'integer',
        'status_id' => 'integer',
        'name' => 'string',
        'user_id' => 'integer',
        'file_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}

<?php

namespace App\Models;

use App\File;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Location extends Model
{
    use SoftDeletes;

    public $table = 'locations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'status_id',
        'lat',
        'lng',
	    'place_id',
	    'formatted_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'status_id' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

	public static function boot()
	{
		parent::boot();

		static::creating(function($model)
		{
			$model->user_id = Sentinel::getUser()->id;
		});
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function statuses()
	{
		return $this->belongsToMany(Status::class)->using(LocationStatus::class)->withTimestamps()->withPivot('name', 'description','user_id','id');
	}

	public function locationStatuses()
	{
		return $this->hasMany(LocationStatus::class);
	}

	public function files()
	{
		return $this->hasMany(FileStatus::class);
	}




}

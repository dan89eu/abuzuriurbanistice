<?php

namespace App\Repositories;

use App\Models\LocationStatus;
use InfyOm\Generator\Common\BaseRepository;

class LocationStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LocationStatus::class;
    }
}

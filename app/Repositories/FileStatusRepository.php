<?php

namespace App\Repositories;

use App\Models\FileStatus;
use InfyOm\Generator\Common\BaseRepository;

class FileStatusRepository extends BaseRepository
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
        return FileStatus::class;
    }
}

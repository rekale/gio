<?php

namespace App\Repositories;

use App\Models\CargoLetter;
use InfyOm\Generator\Common\BaseRepository;

class CargoLetterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'license_plate',
        'customer_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CargoLetter::class;
    }
}

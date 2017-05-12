<?php

namespace App\Repositories;

use App\Models\TravelDocument;
use InfyOm\Generator\Common\BaseRepository;

class TravelDocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'address',
        'arrive_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TravelDocument::class;
    }
}

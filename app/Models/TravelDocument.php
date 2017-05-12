<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TravelDocument
 * @package App\Models
 * @version May 4, 2017, 4:46 pm UTC
 */
class TravelDocument extends Model
{

    public $table = 'travel_documents';
    


    public $fillable = [
        'cargo_letter_id',
        'address',
        'arrive_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cargo_letter_id' => 'integer',
        'address' => 'string',
        'arrive_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cargo_letter_id' => 'required|integer',
        'address' => 'required|string|max:255',
        'arrive_at' => 'unloading_at dateTime date'
    ];

    
}

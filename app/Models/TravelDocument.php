<?php

namespace App\Models;

use App\Models\CargoLetter;
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
        'card_id',
        'address',
        'arrive_at',
        'unloading_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'address' => 'string',
        'arrive_at' => 'datetime',
    ];

    protected $dates = ['unloading_at'];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cargo_letter_id' => 'required',
        'card_id' => 'required|unique:travel_documents',
        'address' => 'required|string|max:255',
        'arrive_at' => 'date|required',
    ];

    public function cargoLetter()
    {
        return $this->belongsTo(CargoLetter::class, 'cargo_letter_id');
    }

}

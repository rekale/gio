<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CargoLetter
 * @package App\Models
 * @version May 2, 2017, 3:18 pm UTC
 */
class CargoLetter extends Model
{

    public $table = 'cargo_letters';
    


    public $fillable = [
        'license_plate',
        'customer_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'license_plate' => 'string',
        'customer_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'license_plate' => 'required|max:10',
        'customer_id' => 'required|integer'
    ];

    
}

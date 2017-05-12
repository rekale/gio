<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Customer
 * @package App\Models
 * @version May 2, 2017, 3:02 pm UTC
 */
class Customer extends Model
{

    public $table = 'customers';
    public $primaryKey = 'customer_id';
    public $incrementing = false;



    public $fillable = [
        'customer_id',
        'name'
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_id' => 'required|unique:customers',
        'name' => 'required|max:15'
    ];


}

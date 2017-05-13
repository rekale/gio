<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Product
 * @package App\Models
 * @version May 2, 2017, 9:18 am UTC
 */
class Product extends Model
{
    public $table = 'products';


    public $fillable = [
        'name',
        'image',
        'weight',
        'price',
        'unit',
        'detail',
        'category_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'image' => 'string',
        'weight' => 'float',
        'price' => 'integer',
        'detail' => 'string',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:25',
        'image' => 'image|max:1000',
        'weight' => 'required',
        'price' => 'required|integer',
        'detail' => 'required|max:10000',
        'category_id' => 'required|integer'
    ];

     public static $updateRules = [
        'name' => 'required|max:25',
        'weight' => 'required',
        'price' => 'required|integer',
        'detail' => 'required|max:10000',
        'category_id' => 'required|integer'
    ];


}

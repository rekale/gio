<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Product;
use App\Models\TravelDocument;
use App\Admin;
use Eloquent as Model;

/**
 * Class CargoLetter
 * @package App\Models
 * @version May 2, 2017, 3:18 pm UTC
 */
class CargoLetter extends Model
{

    public $table = 'cargo_letters';
    public $incrementing = false;


    public $fillable = [
        'id',
        'license_plate',
        'customer_id',
        'admin_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'license_plate' => 'string',
        'admin_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'license_plate' => 'required|max:10',
        'customer_id' => 'required'
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'note']);
    }

    public function user()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function travelDocument()
    {
        return $this->hasOne(TravelDocument::class);
    }

}

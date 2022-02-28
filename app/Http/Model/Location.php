<?php

namespace RefineriaWeb\RWRealEstate\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * @package RefineriaWeb\RWRealEstate\Models
 */
class Location extends Model
{
    public $table = 'locations';

    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}

<?php

namespace RefineriaWeb\RWRealEstate\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyType
 * @package RefineriaWeb\RWRealEstate\Models
 */
class PropertyType extends Model
{
    public $table = 'properties_types';

    public $fillable = [
        'id',
        'type',
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

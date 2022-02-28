<?php

namespace RefineriaWeb\RWRealEstate\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyFeature
 * @package RefineriaWeb\RWRealEstate\Models
 */
class PropertyFeature extends Model
{
    public $table = 'properties_features';

    public $fillable = [
        'property_id',
        'reference',
        'bedrooms',
        'bathrooms',
        'private_pool',
        'community_pool',
        'garden',
        'garaje',
        'price',
        'built_area',
        'land_area',
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

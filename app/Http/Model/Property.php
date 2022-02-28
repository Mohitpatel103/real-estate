<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * @package RefineriaWeb\RWRealEstate\Models
 */
class Property extends Model
{
    public $table = 'properties';

    public $fillable = [
        'name',
        'description',
        'agent_id',
        'location_id',
        'properties_type_id',
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

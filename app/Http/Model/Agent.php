<?php

namespace RefineriaWeb\RWRealEstate\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Agent
 * @package RefineriaWeb\RWRealEstate\Models
 */
class Agent extends Model
{
    public $table = 'agents';

    public $fillable = [
        'name',
        'surname',
        'email',
        'mobile'
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

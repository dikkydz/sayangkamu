<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'registration_number', 'author', 'address', 'model', 'type', 'production_year', 'silinder', 'chassis_number', 'engine_number', 'bpkb_number', 'service_type'
    ];

    
}

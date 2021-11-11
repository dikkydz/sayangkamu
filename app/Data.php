<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Data extends Model implements HasMedia
{
    use Uuids, HasMediaTrait;

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

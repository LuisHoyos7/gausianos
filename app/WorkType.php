<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'service_type_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'service_type_id' => 'integer',
    ];


    public function serviceType()
    {
        return $this->belongsTo(\App\ServiceType::class);
    }
}

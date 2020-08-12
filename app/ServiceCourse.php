<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCourse extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'service_type_id',
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function course()
    {
        return $this->belongsTo(\App\Course::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(\App\ServiceType::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'work_type_id',
        'customer_id',
        'delivery_date',
        'delivery_hour',
        'description',
        'theme',
        'sheets_number',
        'standard',
        'other_course',
        'other_work_type',
        'asesor_id',
        'price'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'work_type_id' => 'integer',
        'customer_id' => 'integer',
    ];


    public function course()
    {
        return $this->belongsTo(\App\Course::class);
    }

    public function workType()
    {
        return $this->belongsTo(\App\WorkType::class);
    }

    public function customer()
    {
        return $this->belongsTo(\App\Customer::class);
    }

    public function asesor()
    {
        return $this->belongsTo(\App\Asesor::class);
    }
}

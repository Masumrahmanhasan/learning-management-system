<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class CourseTimeline extends Model
{
    protected $guarded = [];

    public function model()
    {
        return $this->morphTo();
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}

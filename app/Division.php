<?php

namespace App;

use App\BaseModel;

class Division extends BaseModel
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function schoolheads()
    {
        return $this->hasMany(SchoolHead::class);
    }

    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }
}

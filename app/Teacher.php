<?php

namespace App;

use App\BaseModel;

class Teacher extends BaseModel
{
    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}

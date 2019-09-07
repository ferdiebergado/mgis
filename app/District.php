<?php

namespace App;

use App\BaseModel;

class District extends BaseModel
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class)->where('isSchoolHead', 0);
    }

    public function schoolheads()
    {
        return $this->hasMany(Teacher::class)->where('isSchoolHead', 1);
    }

    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }
}

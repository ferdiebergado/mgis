<?php

namespace App;

use App\BaseModel;

class School extends BaseModel
{
    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
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

    public function teachers()
    {
        return $this->hasMany(Teacher::class)->where('isSchoolHead', 0);
    }

    public function schoolhead()
    {
        return $this->hasOne(Teacher::class)->where('isSchoolHead', 1);
    }
}

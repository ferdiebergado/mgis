<?php

namespace App;

use App\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function schools()
    {
        return $this - HasMany(School::class);
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

<?php

namespace App;

use App\BaseModel;

class Region extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sequence',
        'area',
        'active'
    ];

    public function divisions()
    {
        return $this->hasMany(Division::class);
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

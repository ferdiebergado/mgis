<?php

namespace App;

use App\BaseModel;

class Teacher extends BaseModel
{
    protected $fillable = [
        'last_name',
        'first_name',
        'mi',
        'sex',
        'birth_date',
        'years_mg',
        'school_id',
        'region_id',
        'division_id',
        'district_id',
        'isSchoolHead'
    ];

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

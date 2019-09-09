<?php

namespace App;

use App\BaseModel;

class School extends BaseModel
{
    protected $fillable = [
        'name',
        'schid',
        'type',
        'district_id',
        'division_id',
        'region_id'
    ];

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
        return $this->hasMany(Teacher::class);
    }

    public function schoolhead()
    {
        return $this->hasOne(SchoolHead::class);
    }
}

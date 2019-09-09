<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolHead extends Model
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

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}

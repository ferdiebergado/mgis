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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'male_enrolment' => 'integer',
        'female_enrolment' => 'integer',
        'total_enrolment' => 'integer'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'male_enrolment',
        'female_enrolment',
        'total_enrolment'
    ];

    /**
     * Get the divisions of the region.
     */
    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    /**
     * Get the districts of the region.
     */
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    /**
     * Get the schools of the region.
     */
    public function schools()
    {
        return $this->hasMany(School::class);
    }

    /**
     * Get the teachers of the region.
     */
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    /**
     * Get the school heads of the region.
     */
    public function schoolheads()
    {
        return $this->hasMany(SchoolHead::class);
    }

    /**
     * Get the enrolments of the region.
     */
    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }

    /**
     * Get the male enrolment of the region.
     *
     * @return integer
     */
    public function getMaleEnrolmentAttribute(): int
    {
        return (int) $this->enrolments()->sum('male');
    }

    /**
     * Get the female enrolment of the region.
     *
     * @return integer
     */
    public function getFemaleEnrolmentAttribute(): int
    {
        return (int) $this->enrolments()->sum('female');
    }

    /**
     * Get the total enrolment of the region.
     *
     * @return integer
     */
    public function getTotalEnrolmentAttribute(): int
    {
        $male = $this->enrolments()->sum('male');
        $female = $this->enrolments()->sum('female');
        return (int) $male + $female;
    }
}

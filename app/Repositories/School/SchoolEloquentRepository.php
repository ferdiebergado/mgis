<?php

namespace App\Repositories\School;

use App\School;
use App\Repositories\EloquentRepository;
use App\Repositories\School\SchoolRepositoryInterface;

class SchoolEloquentRepository extends EloquentRepository implements SchoolRepositoryInterface
{
    protected $model;

    /**
     * Class constructor.
     */
    public function __construct(School $school)
    {
        $this->model = $school;
    }

    public function findOneWithAll(int $id)
    {
        return $this->model->with(['teachers', 'schoolhead', 'region', 'division', 'district', 'enrolments'])->findOrFail($id);
    }
}

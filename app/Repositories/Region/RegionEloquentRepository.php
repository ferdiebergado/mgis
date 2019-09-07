<?php

namespace App\Repositories\Region;

use App\Region;
use App\Repositories\EloquentRepository;
use App\Repositories\Region\RegionRepositoryInterface;

class RegionEloquentRepository extends EloquentRepository implements RegionRepositoryInterface
{
    protected $model;

    /**
     * Class constructor.
     */
    public function __construct(Region $region)
    {
        $this->model = $region;
    }
}

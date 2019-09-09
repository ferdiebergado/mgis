<?php

namespace App\Repositories\Region;

use App\Region;
use App\Repositories\EloquentRepository;
use App\Repositories\Region\RegionRepositoryInterface;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

class RegionEloquentRepository extends EloquentRepository implements RegionRepositoryInterface
{
    /**
     * @var \App\Region
     */
    protected $model;

    /**
     * Class constructor.
     * @param \App\Region $region
     */
    public function __construct(Region $region)
    {
        $this->model = $region;
    }

    /**
     * Get all regions including all its relations.
     * @return \GeneaLabs\LaravelModelCaching\CachedBuilder
     */
    public function allWithCount(): CachedBuilder
    {
        return $this->model->withCount(['divisions', 'districts', 'schools', 'teachers']);
    }
}

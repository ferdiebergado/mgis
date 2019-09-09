<?php

namespace App\Repositories\Region;

use App\Repositories\BaseRepositoryInterface;
use GeneaLabs\LaravelModelCaching\CachedBuilder;

interface RegionRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get all regions including all its relations.
     * @return \GeneaLabs\LaravelModelCaching\CachedBuilder
     */
    public function allWithCount(): CachedBuilder;
}

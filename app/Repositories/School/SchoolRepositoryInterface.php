<?php

namespace App\Repositories\School;

use App\Repositories\BaseRepositoryInterface;

interface SchoolRepositoryInterface extends BaseRepositoryInterface
{
    public function findOneWithAll(int $id);
}

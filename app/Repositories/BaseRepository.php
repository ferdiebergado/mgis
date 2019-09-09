<?php

namespace App\Repositories;

use App\BaseModel;
use App\Repositories\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var \App\BaseModel
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param \App\BaseModel $model
     */
    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }
}

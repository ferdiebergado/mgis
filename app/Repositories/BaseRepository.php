<?php
namespace App\Repositories;
use App\BaseModel;
use App\Repositories\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }
}

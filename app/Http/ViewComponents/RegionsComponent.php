<?php

namespace App\Http\ViewComponents;

use App\Repositories\Region\RegionRepositoryInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;

class RegionsComponent implements Htmlable
{
    protected $repository;

    public function __construct(RegionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function toHtml()
    {
        return View::make('region.widget')
            ->with('regions', $this->repository->all(['id', 'name', 'sequence', 'area'], 'sequence', 'asc'))
            ->render();
    }
}

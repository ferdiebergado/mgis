<?php

namespace App\Http\ViewComponents;

use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;

class ViewComponent implements Htmlable
{
    protected ;

    public function __construct(BaseRepositoryInterface )
    {
        ->repository = ;
    }

    public function toHtml()
    {
        return View::make('highlights')
            ->with('highlights', ->repository->highlights())
            ->render();
    }
}

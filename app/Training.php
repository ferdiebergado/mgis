<?php

namespace App;

use App\BaseModel;

class Training extends BaseModel
{
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}

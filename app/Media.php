<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{

    protected $guarded = [];

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }
}
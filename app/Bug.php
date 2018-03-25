<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function issue()
    {
        return $this->morphOne(Issue::class, 'issuable');
    }
}
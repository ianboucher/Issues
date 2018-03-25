<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
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

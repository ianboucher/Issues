<?php

namespace App;

use App\User;
use App\Issue;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = ['name'];

    public function users() 
    {
        return $this->hasMany(User::class);
    }

    public function issues() 
    {
        return $this->hasMany(Issue::class);
    }
}

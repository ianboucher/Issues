<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'severity',
    ];

    public function createdBy() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function organisation() 
    {
        return $this->belongsTo(Organisation::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\OrganisationScope;

class Issue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'severity', 'user_id'
    ];

    protected static function boot() {
        parent::boot();

        static::addGlobalScope(new OrganisationScope);
    }

    public function createdBy() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function organisation() 
    {
        return $this->belongsTo(Organisation::class);
    }

    public function issuable()
    {
        return $this->morphTo();
    }

    public function type()
    {
        return class_basename($this->issuable_type);
    }
}

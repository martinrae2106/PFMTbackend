<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'roleNumber'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}

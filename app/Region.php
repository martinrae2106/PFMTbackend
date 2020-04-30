<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $fillable = ['name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}


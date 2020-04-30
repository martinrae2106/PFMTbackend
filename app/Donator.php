<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Donator extends Model
{

    protected $fillable = ['fullName', 'emailAddress', 'postalCode', 'billingAddress1', 'billingAddress2', 'cityTown', 'region', 'emailContactApproved', 'childName', 'teacherName'];

    public function donations()
    {
        return  $this->hasMany(Donation::class);
    }
}

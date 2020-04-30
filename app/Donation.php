<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{

    protected $fillable = ['donationValue', 'stripeToken', 'transactionStatus'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function donator()
    {
        return $this->belongsTo(Donator::class);
    }
}

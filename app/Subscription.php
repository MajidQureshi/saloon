<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function subscription_details()
    {
        return $this->hasMany(SubscriptionDetail::class, 'subscription_id');
    }
}
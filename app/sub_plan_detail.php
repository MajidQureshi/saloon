<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class sub_plan_detail extends Model
{

    public function subscriptions($sub_ids)
    {
        $sub_ids = explode(',', $sub_ids);
        return Subscription::whereIn('id', $sub_ids)->get();
    }
}
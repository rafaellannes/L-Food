<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Plan;


class PlanObserver
{
    public function creating(Plan $plan)
    {
        $ascii = Str::ascii($plan->name);
        $plan->url = Str::kebab($ascii);
    }

    public function updating(Plan $plan)
    {
        $ascii = Str::ascii($plan->name);
        $plan->url = Str::kebab($ascii);
    }


    public function created(Plan $plan)
    {
        //
    }


    public function updated(Plan $plan)
    {
        //
    }


    public function deleted(Plan $plan)
    {
        //
    }


    public function restored(Plan $plan)
    {
        //
    }


    public function forceDeleted(Plan $plan)
    {
        //
    }
}

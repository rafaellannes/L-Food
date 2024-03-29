<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Plan;
use App\Models\Profile;

class PlanProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;

        $this->middleware(['can:plans']);
    }

    public function profiles($idPlan)
    {
        $plan = $this->plan->find($idPlan);

        if (!$plan) {
            return redirect()->back;
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', compact('plan', 'profiles'));
    }

    public function profilesAvailable(Request $request, $idPlan)
    {

        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back;
        }

        $filters = $request->except('_token');

        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available', compact('plan', 'profiles', 'filters'));
    }

    public function attachProfilesPlan(Request $request, $idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back;
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()->back()->withErrors('Necessário escolher pelo menos um Plano');
        }
        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->id);
    }

    public function detachProfilesPlan($idPlan, $idProfile)
    {

        $plan = $this->plan->findOrFail($idPlan);
        $profile = $this->profile->findOrFail($idProfile);

        if (!$plan || !$profile) {
            return redirect()->back;
        }


        $plan->profiles()->detach($profile);

        return redirect()->route('plans.profiles', $plan->id);
    }

    public function plans($idProfile)
    {

        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back;
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', compact('profile', 'plans'));
    }
}

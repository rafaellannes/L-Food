<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Http\Requests\StoreUpdatePlan;

use Illuminate\Http\Request;

use Alert;


class PlanController extends Controller

{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
        $this->middleware(['can:plans']);
    }

    public function index()
    {
        $plans = $this->repository->paginate();

        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('plans.index')->with('success', 'Plano cadastrado com sucesso');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', compact('plan'));
    }

    public function destroy($url)
    {
        $plan = $this->repository->with('details')->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        if ($plan->details->count() > 0) {
            return redirect()->back()->with('errors', 'Existem detalhes vinculados ao plano');
        }
        $plan->delete();
        return redirect()->route('plans.index')->with('success', 'Plano excluido com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);
        return view('admin.pages.plans.index', compact('plans', 'filters'));
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit', compact('plan'));
    }

    public function update($url, StoreUpdatePlan $request)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        $plan->update($request->all());
        return redirect()->route('plans.index')->with('success', 'Plano editado com sucesso');
    }
}

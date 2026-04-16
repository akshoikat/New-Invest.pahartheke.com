<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investplan;

class InvestplanController extends Controller
{
    public function index()
    {
        $plans = InvestPlan::latest()->get();
        return view('backend.invest-plan.index', compact('plans'));
    }

    public function store(Request $request)
    {
        InvestPlan::create($request->all());

        return back()->with('success', 'Invest Plan Created');
    }

    public function edit($id)
    {
        return response()->json(InvestPlan::findOrFail($id));
    }

    public function update(Request $request)
    {
        $plan = InvestPlan::findOrFail($request->id);
        $plan->update($request->all());

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        InvestPlan::findOrFail($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}

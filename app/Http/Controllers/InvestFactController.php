<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestFact;

class InvestFactController extends Controller
{
    public function index()
    {
        $facts = InvestFact::latest()->get();
        return view('backend.invest_fact.index', compact('facts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'highlight_text' => 'required|string',
            'description' => 'required|string',
        ]);

        InvestFact::create($request->all());

        return redirect()->back()->with('success', 'Fact Added Successfully');
    }

    public function edit($id)
    {
        $fact = InvestFact::findOrFail($id);
        return response()->json($fact);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'icon' => 'required|string',
            'highlight_text' => 'required|string',
            'description' => 'required|string',
        ]);

        $fact = InvestFact::findOrFail($request->id);
        $fact->update($request->all());

        return redirect()->back()->with('success', 'Fact Updated Successfully');
    }

    public function destroy($id)
    {
        $fact = InvestFact::findOrFail($id);
        $fact->delete();

        return redirect()->back()->with('success', 'Fact Deleted Successfully');
    }
}

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
        return response()->json(
            InvestFact::findOrFail($id)
        );
    }

    public function update(Request $request,$id)
    {
        $fact = InvestFact::findOrFail($id);

        $fact->update([
            'icon' => $request->icon,
            'highlight_text' => $request->highlight_text,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'Fact Updated Successfully');
    }

    public function destroy($id)
    {
        $fact = InvestFact::findOrFail($id);
        $fact->delete();

        return redirect()->back()->with('success', 'Fact Deleted Successfully');
    }
}

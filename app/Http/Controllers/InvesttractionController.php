<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investtraction;

class InvesttractionController extends Controller
{
 public function index()
    {
        $tractions = InvestTraction::latest()->get();
        return view('backend.invest-traction.index', compact('tractions'));
    }

    public function store(Request $request)
    {
        InvestTraction::create($request->all());

        return back()->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        return response()->json(InvestTraction::findOrFail($id));
    }

    public function update(Request $request)
    {
        $traction = InvestTraction::findOrFail($request->id);
        $traction->update($request->all());

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        InvestTraction::findOrFail($id)->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}

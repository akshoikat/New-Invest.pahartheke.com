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

public function update(Request $request,$id)
{
    $traction = InvestTraction::findOrFail($id);

    $traction->update([
        'icon' => $request->icon, // text field (fas fa-...)
        'highlight' => $request->highlight,
        'description' => $request->description,
    ]);

    return back()->with('success', 'Updated Successfully');
}

    public function destroy($id)
    {
        InvestTraction::findOrFail($id)->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}

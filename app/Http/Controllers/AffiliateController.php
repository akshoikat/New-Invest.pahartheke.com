<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{  // Display a listing of the resource
    public function index()
    {
        $affiliates = Affiliate::latest()->paginate(10);
        return view('backend.affiliate.index', compact('affiliates'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('backend.affiliate.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|string',
            'link' => 'required|string',
            'repeat_customer' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // dd($request->repeat_customer);
        Affiliate::create($request->all());

        return redirect()->route('admin.affiliate.index')->with('success', 'Affiliate Product Created Successfully!');
    }

    // Display the specified resource
    public function show(Affiliate $affiliate)
    {
        return view('backend.affiliate.show', compact('affiliate'));
    }

    // Show the form for editing the specified resource
    public function edit(Affiliate $affiliate)
    {
        return view('backend.affiliate.edit', compact('affiliate'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Affiliate $affiliate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|string',
            'link' => 'required|string',
            'status' => 'required|boolean',
            'repeat_customer' => 'required|string',

        ]);
       

    
        $affiliate->update($request->all());

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Affiliate Product Updated successfully');
        return redirect()->route('admin.affiliate.index');
    }

    // Remove the specified resource from storage
    public function destroy(Affiliate $affiliate)
    {
        $affiliate->delete();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Affiliate Product Delete successfully');
        return redirect()->route('admin.affiliate.index');
    }
}

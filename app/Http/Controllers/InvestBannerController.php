<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestBanner;

class InvestBannerController extends Controller
{
public function index()
    {
        $banners = InvestBanner::latest()->get();
        return view('backend.invest_banner.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'points' => 'required|array',
            'button_text' => 'nullable|string'
        ]);

        InvestBanner::create([
            'title' => $request->title,
            'points' => $request->points,
            'button_text' => $request->button_text,
        ]);

        return back()->with('success','Banner Created Successfully');
    }

    public function edit($id)
    {
        $banner = InvestBanner::findOrFail($id);
        $banner->points = json_decode($banner->points);

        return response()->json($banner);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'points' => 'required|array',
        ]);

        $banner = InvestBanner::findOrFail($request->id);

        $banner->update([
            'title' => $request->title,
            'points' => json_encode($request->points),
            'button_text' => $request->button_text,
        ]);

        return back()->with('success','Banner Updated Successfully');
    }

    public function destroy($id)
    {
        InvestBanner::findOrFail($id)->delete();
        return back()->with('success','Banner Deleted Successfully');
    }
}

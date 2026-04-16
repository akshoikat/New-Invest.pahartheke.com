<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\Traits\FileSaver;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class BannerController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderByDesc('id')->get();
        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);


        $banner = new Banner();
        $banner->title = $request->title;
 
        if($request->hasFile('image')){
            $banner->image = $this->upload_file($request->file('image'), 'banner', null,  $banner->title);
        }

        $banner->save();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Banner created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        return response()->json($banner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);


        $banner = Banner::find($request->id);
        $banner->title = $request->title;
        $banner->status = $request->status;

        if($request->hasFile('image')){
            $banner->image = $this->upload_file($request->file('image'), 'banner', $banner->image,  $banner->title);
        }

        $banner->save();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Banner updated successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);

        if(isset($banner->logo)){
            unlink($banner->logo);
        }

        $banner->delete();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Banner deleted successfully');

        return redirect()->back();
    }
}

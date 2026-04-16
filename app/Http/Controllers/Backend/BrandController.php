<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\Traits\FileSaver;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class BrandController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('order', 'ASC')->get();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Update order.
     */
    public function updateOrder(Request $request){
        $order = $request->order;
        $brands = Brand::all();

        foreach($brands as $brand){
            $id = $brand->id;

            foreach($request->order as $order){
                if($order['id'] == $id){
                    $brand->update([
                        'order' => $order['position']
                    ]);
                }
            }
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|unique:brands,name',
            'meta_tag' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'logo'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = str()->slug($request->name);
        $brand->meta_tag = $request->meta_tag;
        $brand->meta_description = $request->meta_description;
        $brand->keywords = $request->keywords;

        if($request->hasFile('logo')){
            $brand->logo = $this->upload_file($request->file('logo'), 'brand', null,  $brand->name);
        }

        $brand->save();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Brand created successfully');

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:brands,name,'.$request->id,
            'meta_tag' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'logo'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
        ]);

        $brand = Brand::find($request->id);
        $brand->name = $request->name;
        $brand->slug = str()->slug($request->name);
        $brand->meta_tag = $request->meta_tag;
        $brand->meta_description = $request->meta_description;
        $brand->keywords = $request->keywords;
        $brand->status = $request->status;

        if($request->hasFile('logo')){
            $brand->logo = $this->upload_file($request->file('logo'), 'brand', $brand->logo,  $brand->name);
        }

        $brand->save();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Brand updated successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);

        if(isset($brand->logo)){
            unlink($brand->logo);
        }

        $brand->delete();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Brand deleted successfully');

        return redirect()->back();

    }
}

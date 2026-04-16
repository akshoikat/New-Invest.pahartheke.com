<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use App\Traits\Traits\FileSaver;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class ProductController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->get();

        return view('backend.product.index', compact('products'));
    }

   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('status', 'active')->orderByDesc('id')->get();
        $categories = Category::where('status', 'active')->orderByDesc('id')->get();
        $units = Unit::orderByDesc('id')->get();

        return view('backend.product.form', compact(['brands', 'categories','units']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->all();
        // dd($request->all());
        $request->validate([
            'brand' => 'required|exists:brands,id',
            'category' => 'required|exists:categories,id',
            'name' => 'required|string',
            'regular_price' => 'required',
            'unit' => 'required',
            'meta_tag' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'shipping_cost' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = new Product();
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;
        $product->unit_id = $request->unit;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->slug = str()->slug($request->name);
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->regular_price;
        $product->meta_tag = $request->meta_tag;
        $product->meta_description = $request->meta_description;
        $product->keywords = $request->keywords;
        $product->shipping_cost = $request->shipping_cost;

       

        if ($request->hasFile('thumbnail')) {
            $product->thumbnail = $this->upload_file($request->file('thumbnail'), 'product', null, $product->name);
        }

        if ($request->hasFile('image')) {
            $product->image = $this->upload_file($request->file('image'), 'product', null, $product->name);
        }

        $product->save();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Product created successfully');

        return redirect()->route('admin.product.index');
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
        $brands = Brand::where('status', 'active')->orderByDesc('id')->get();
        $categories = Category::where('status', 'active')->orderByDesc('id')->get();
        $units = Unit::orderByDesc('id')->get();


        $product = Product::find($id);

        return view('backend.product.form', compact(['product', 'brands', 'categories','units']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand' => 'required|exists:brands,id',
            'category' => 'required|exists:categories,id',
            'unit' => 'required|exists:units,id',
            'name' => 'required|string',
            'regular_price' => 'required',
            'meta_tag' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
            'shipping_cost' => 'nullable|string',

        ]);

        $product = Product::find($id);
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;
        $product->unit_id = $request->unit;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->slug = str()->slug($request->name);
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->regular_price;
        $product->meta_tag = $request->meta_tag;
        $product->meta_description = $request->meta_description;
        $product->keywords = $request->keywords;
        $product->status = $request->status;
        $product->shipping_cost = $request->shipping_cost;

        if ($request->hasFile('thumbnail')) {
            $product->thumbnail = $this->upload_file($request->file('thumbnail'), 'product', $product->thumbnail, $product->name);
        }

        if ($request->hasFile('image')) {
            $product->image = $this->upload_file($request->file('image'), 'product', $product->image, $product->name);
        }

        $product->save();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Product updated successfully');

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product->thumbnail) {
            unlink($product->thumbnail);
        }

        if ($product->image) {
            unlink($product->image);
        }

        $product->delete();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Product deleted successfully');

        return redirect()->back();
    }
}

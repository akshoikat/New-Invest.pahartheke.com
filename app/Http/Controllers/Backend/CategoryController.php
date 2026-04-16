<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('order', 'ASC')->get();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Update order.
     */
    public function updateOrder(Request $request){
        $order = $request->order;
        $categories = Category::all();

        foreach($categories as $category){
            $id = $category->id;

            foreach($request->order as $order){
                if($order['id'] == $id){
                    $category->update([
                        'order' => $order['position']
                    ]);
                }
            }
        }

        return 'success';
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
            'name' => 'required|string|unique:categories,name',
            'meta_tag' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'keywords' => $request->keywords,
        ]);

        return redirect()->back()->with('success', 'Category created successfully');
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
        $category = Category::find($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,'.$request->id,
            'meta_tag' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'status' => 'required',
        ]);

        Category::find($request->id)->update([
            'name' => $request->name,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'keywords' => $request->keywords,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}

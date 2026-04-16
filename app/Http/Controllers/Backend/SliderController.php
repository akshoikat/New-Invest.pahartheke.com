<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\Traits\FileSaver;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class SliderController extends Controller
{

    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('order', 'ASC')->get();
        return view('backend.slider.index', compact('sliders'));
    }

    
    /**
     * Update order.
     */
    public function updateOrder(Request $request){
        $order = $request->order;
        $sliders = Slider::all();

        foreach($sliders as $slider){
            $id = $slider->id;

            foreach($request->order as $order){
                if($order['id'] == $id){
                    $slider->update([
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'discount_price' => 'required',
            'starting_price' => 'required',
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->starting_price = $request->starting_price;
        $slider->regular_price = $request->regular_price;
        $slider->discount_price = $request->discount_price;
        $slider->shop_now = [
            'name' => $request->shop_now_name,
            'link' => $request->shop_now_link
        ];

        if($request->hasFile('image')){
            $slider->image = $this->upload_file($request->file('image'), 'slider', null,  $slider->title);
        }

        $slider->save();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Slider created successfully');

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
        $slider = Slider::find($id);
        return response()->json($slider);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'discount_price' => 'required',
            'starting_price' => 'required',
        ]);

        $slider = Slider::find($request->id);
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->starting_price = $request->starting_price;
        $slider->regular_price = $request->regular_price;
        $slider->discount_price = $request->discount_price;
        $slider->shop_now = [
            'name' => $request->shop_now_name,
            'link' => $request->shop_now_link
        ];

        if($request->hasFile('image')){
            $slider->image = $this->upload_file($request->file('image'), 'slider', $slider->image,  $slider->title);
        }

        $slider->update();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Slider updated successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);

        if(isset($slider->image)){
            unlink($slider->image);
        }

        $slider->delete();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Slider deleted successfully');

        return redirect()->back();
    }
}

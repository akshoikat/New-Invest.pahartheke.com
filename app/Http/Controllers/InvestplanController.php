<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investplan;

class InvestplanController extends Controller
{
    public function index()
    {
        $plans = Investplan::latest()->get();
        return view('backend.invest-plan.index', compact('plans'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'short_description',
            'details',
            'button_text',
            'button_apply',
            'apply_link',
        ]);

        if ($request->hasFile('image_1')) {
            $data['image_1'] = $this->uploadImage($request->file('image_1'));
        }

        if ($request->hasFile('image_2')) {
            $data['image_2'] = $this->uploadImage($request->file('image_2'));
        }

        if ($request->hasFile('image_3')) {
            $data['image_3'] = $this->uploadImage($request->file('image_3'));
        }

        Investplan::create($data);

        return back()->with('success', 'Invest Plan Created');
    }

    public function edit($id)
    {
        return response()->json(Investplan::findOrFail($id));
    }

    public function update(Request $request)
    {
        $plan = Investplan::findOrFail($request->id);

        $data = $request->only([
            'title',
            'short_description',
            'details',
            'button_text',
            'button_apply',
            'apply_link',
        ]);

        if ($request->hasFile('image_1')) {
            $data['image_1'] = $this->uploadImage($request->file('image_1'));
        }

        if ($request->hasFile('image_2')) {
            $data['image_2'] = $this->uploadImage($request->file('image_2'));
        }

        if ($request->hasFile('image_3')) {
            $data['image_3'] = $this->uploadImage($request->file('image_3'));
        }

        $plan->update($data);

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        Investplan::findOrFail($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    private function uploadImage($image)
    {
        $folder = public_path('uploads/investplan');

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        $name = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move($folder, $name);

        return 'uploads/investplan/'.$name;
    }
}
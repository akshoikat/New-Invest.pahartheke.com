<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investplan;

class InvestplanApiController extends Controller
{
       public function getInvestPlan()
    {
        $plans = Investplan::latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'Invest plans fetched successfully',
            'data' => $plans
        ], 200);
    }

    public function getInvestPlanById($id)
    {
        $plan = Investplan::find($id);

        if (!$plan) {
            return response()->json([
                'status' => false,
                'message' => 'Invest plan not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Invest plan fetched successfully',
            'data' => $plan
        ], 200);
    }

    public function postInvestPlan(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'details' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_apply' => 'nullable|string|max:255',
            'apply_link' => 'nullable|string|max:255',
            'image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'title',
            'short_description',
            'details',
            'button_text',
            'button_apply',
            'apply_link',
        ]);

        foreach (['image_1', 'image_2', 'image_3'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $this->uploadImage($request->file($imageField));
            }
        }

        $plan = Investplan::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Invest plan created successfully',
            'data' => $plan
        ], 201);
    }

    public function putInvestPlan(Request $request, $id)
    {
        $plan = Investplan::find($id);

        if (!$plan) {
            return response()->json([
                'status' => false,
                'message' => 'Invest plan not found'
            ], 404);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'short_description' => 'nullable|string',
            'details' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_apply' => 'nullable|string|max:255',
            'apply_link' => 'nullable|string|max:255',
            'image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'title',
            'short_description',
            'details',
            'button_text',
            'button_apply',
            'apply_link',
        ]);

        foreach (['image_1', 'image_2', 'image_3'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $this->uploadImage($request->file($imageField));
            }
        }

        $plan->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Invest plan updated successfully',
            'data' => $plan
        ], 200);
    }

    public function deleteInvestPlan($id)
    {
        $plan = Investplan::find($id);

        if (!$plan) {
            return response()->json([
                'status' => false,
                'message' => 'Invest plan not found'
            ], 404);
        }

        $plan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Invest plan deleted successfully'
        ], 200);
    }

    private function uploadImage($image)
    {
        $folder = public_path('uploads/investplan');

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($folder, $name);

        return 'uploads/investplan/' . $name;
    }
}

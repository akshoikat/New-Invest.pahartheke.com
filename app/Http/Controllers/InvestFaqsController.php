<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestFaqs;

class InvestFaqsController extends Controller
{
     public function index()
    {
        $faqs = InvestFaqs::latest()->get();
        return view('backend.invest_faq.index', compact('faqs'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
            'status'   => 'required|boolean',
        ]);

        InvestFaqs::create([
            'question' => $request->question,
            'answer'   => $request->answer,
            'status'   => $request->status,
        ]);

        return redirect()->back()->with('success', 'FAQ created successfully');
    }

    // EDIT (AJAX)
    public function edit($id)
    {
        return response()->json(InvestFaqs::findOrFail($id));
    }

    // UPDATE
public function update(Request $request,$id)
{
    $faq = InvestFaqs::findOrFail($id);

    $faq->update([
        'question' => $request->question,
        'answer' => $request->answer,
        'status' => $request->status
    ]);

        return redirect()->back()->with('success', 'FAQ updated successfully');
    }

    // DELETE
    public function destroy($id)
    {
        $faq = InvestFaqs::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $source = Source::first();
        return view('backend.source_content.index', compact('source'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $source = source::first() ?? new source();

        $source->updateOrCreate(
            ['id' => $source->id],
            [
                "our_source" => $request->our_source,
                "delivary_process" => $request->delivary_process,
            ]
        );


        return redirect()->back();
    }
}

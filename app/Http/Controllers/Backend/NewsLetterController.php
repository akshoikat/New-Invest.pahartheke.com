<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class NewsLetterController extends Controller
{
    public function index(Request $request)
    {
        $newsLetters = NewsLetter::orderByDesc('id')->get();

        return view('backend.newsletter.index', compact('newsLetters'));
    }

    public function destroy($id)
    {
        $newsLetter = NewsLetter::find($id);
        if ($newsLetter) {
            $newsLetter->delete();
            flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('NewsLetter deleted successfully');
        }

        return redirect()->back();
    }
}

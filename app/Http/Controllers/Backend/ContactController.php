<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderByDesc('id')->get();

        return view('backend.contact.index', compact('contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Contact deleted successfully');
        return redirect()->back();
    }
}

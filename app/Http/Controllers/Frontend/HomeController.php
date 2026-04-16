<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\NewsLetter;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Affiliate;
use App\Models\Source;
use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Flasher\Prime\FlasherInterface;

class HomeController extends Controller
{
    public function index()
    {
      
   
        $banners = Banner::where('status', 'active')->orderByDesc('id')->get();
        $products = Product::where('status', 'active')->orderByDesc('id')->get();
        $affiliates = Affiliate::where('status',1)->orderByDesc('id')->limit(4)->get();

        $source = Source::first();
        $setting = Setting::first();
        
     

        
       
        // $orders = customerOrder::where('status', 'active')->orderByDesc('id')->get();


        return view('home', compact('banners','products','affiliates','source','setting'));
    }

    public function getProductByCategory(Request $request)
    {
        if($request->id == 'all'){
            $products = Product::with('brand')->orderByDesc('id')->get();
            return response()->json($products);
        }
        $products = Product::with('brand')->where('category_id', $request->id)->orderByDesc('id')->get();
        return response()->json($products);
    }


    public function storeNewsLetter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:news_letters',
        ]);

        $newsLetter = new NewsLetter();
        $newsLetter->email = $request->email;
        $newsLetter->save();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('You have subscribed successfully');
        return redirect()->back();
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Your message has been sent successfully');
        return redirect()->back();
    }

}
    


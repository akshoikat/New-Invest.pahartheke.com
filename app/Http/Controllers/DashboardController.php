<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
 
    public function index(){
        
        $orders = Order::latest()->paginate(10);
        $totalOrder = Order::All()->count();
        $pendingOrder = Order::where('status','=','Pending')->get()->count();
        $deliverdOrder = Order::where('status','=','Delivered')->get()->count();
        return view('backend.dashboard', compact('orders','totalOrder','pendingOrder','deliverdOrder'));
    }
}

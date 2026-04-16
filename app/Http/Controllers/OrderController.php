<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->get();
       
      
        return view('backend.order.index',compact('orders'));
    }
    public function show($id){
        
        
        $order = Order::with('product')->findOrFail($id);
        // dd($order);
        return view('backend.order.show',compact('order'));
    }


    public function statusUpdate(Request $request){
        

        $order = Order::find($request->id);

   
        if(!$order){
            return response()->json([
                "msg" => "Order Not Found",
                "status" => false
            ]);
        }

        $ook = $order->update([
            'status' => $request->status
        ]);

        if($ook && $request->status === "Confirm"){
            $content = "Your Pahar Theke order has been confirmed. Your total bill is:" . $order->total_price . " Note: Total amount may vary due to the actual weight of the product.";
            
            $resSms = $this->sendSMS($order->phone,"Pahar Theke",$content);
            dd($resSms);
        }


        return response()->json([
            "msg" => "Order Update Successfully",
            "status" => true
        ]);

    }


    public function sendSMS($to, $from, $text)
    {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "VBcQnYEQrG5Oa6fujqSC";
        $senderid = "Pahar Theke";
        $number = $to;
        $message = $text;

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];

        // dd($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $p = explode("|", $response);
        $sendstatus = $p[0];
        return $sendstatus;
    }


}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index($id)
    {

        $product = Product::where('status', 'active')->where('id', $id)->first();

        return view('checkout', compact('product',));
    }


    public function store(Request $request, $id)
    {

        
        // return $request->all();
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'phone' => 'required|numeric|digits_between:10,15',
            'address' => 'required|string|min:3|max:255',

           
        ]);
      
        // If validation fails, return JSON errors
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        //dd($request->all(),$id);

        $pro = Product::find($id); 
    // 
        $subtotal = intval($pro->discount_price) * intval($request->quantity);

        $shippingCost = $pro->shipping_cost ?? 0;
        // Process Order (example logic)
        $order = Order::create([
            
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'shipping_cost' => $shippingCost,
            'delivery_charge' => $shippingCost,
            "product_id" => $id,
            'quantity' => $request->quantity,
            'subtotal' => $subtotal,
            'total_price' => intval($subtotal) + intval($shippingCost)

            
        ]);
     

        // dd($order);

        $content = "Your Pahar Theke order has been placed. Your total bill is:" . $order->total_price . " Note: Total amount may vary due to the actual weight of the product.";

        //$this->sendSMS($order->phone, "Pahar Theke", $content);

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully!',
            'redirect_url' => route('frontend.home'), // Redirect to home after submission
            "order" => $order->toArray()
          
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

        //dd($data);
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

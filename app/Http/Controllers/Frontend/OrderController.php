<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{
    Cart,
    Order,
    OrderDetails,
    ProductAttri
};
use Illuminate\Http\Request;

use Razorpay\Api\Api;
use Exception;
use Mail;

class OrderController extends Controller
{
    public function place_order(Request $request)
    {
        $request->validate([
            'first_name1' => 'required',
            'last_name1' => 'required',
            'email1' => 'required|email',
            'phone_number1' => 'required|digits:10',
            'address1' => 'required',
            'state1' => 'required',
            'city1' => 'required',
            'zip_code1' => 'required',
            'first_name2' => 'required',
            'last_name2' => 'required',
            'email2' => 'required|email',
            'phone_number2' => 'required|digits:10',
            'address2' => 'required',
            'state2' => 'required',
            'city2' => 'required',
            'zip_code2' => 'required'
        ],[
            'first_name1.required' => 'First name field is required',    
            'last_name1.required' => 'Last name field is required', 
            'email1.required' => 'Email field is required',    
            'email1.email' => 'Email must be a valid email address',
            'phone_number1.required' => 'Phone number field is required',
            'phone_number1.digits' => 'Phone number must be 10 digits',
            'address1.required' => 'Address field is required',
            'state1.required' => 'State field is required',
            'city1.required' => 'City field is required',
            'zip_code1.required' => 'Zip Code field is required',
            'first_name2.required' => 'First name field is required',    
            'last_name2.required' => 'Last name field is required', 
            'email2.required' => 'Email field is required',    
            'email2.email' => 'Email must be a valid email address',
            'phone_number2.required' => 'Phone number field is required',
            'phone_number2.digits' => 'Phone number must be 10 digits',
            'address2.required' => 'Address field is required',
            'state2.required' => 'State field is required',
            'city2.required' => 'City field is required',
            'zip_code2.required' => 'Zip Code field is required'
        ]);

        $order_type = $request->order_type;
        $first_name1 = $request->first_name1;
        $last_name1 = $request->last_name1;
        $email1 = $request->email1;
        $phone_number1 = $request->phone_number1;
        $address1 = $request->address1;
        $address21 = $request->address21;
        $state1 = $request->state1;
        $city1 = $request->city1;
        $zip_code1 = $request->zip_code1;
        $first_name2 = $request->first_name2;
        $last_name2 = $request->last_name2;
        $email2 = $request->email2;
        $phone_number2 = $request->phone_number2;
        $address2 = $request->address2;
        $address22 = $request->address22;
        $state2 = $request->state2;
        $city2 = $request->city2;
        $zip_code2 = $request->zip_code2;

        $user_id = get_user_id();
        $cart = Cart::with('product','product_attr')->where(['user_id'=>$user_id])->get();
        $cart_arr = $cart->toArray();

        if($order_type == "COD")
        {
            try {
               
            $order = new Order();

            $order->user_id = $user_id;
            $order->first_name1 = $first_name1;
            $order->last_name1 = $last_name1;
            $order->email1 = $email1;
            $order->phone_number1 = $phone_number1;
            $order->address1 = $address1;
            $order->address21 = $address21;
            $order->state1 = $state1;
            $order->city1 = $city1;
            $order->zip_code1 = $zip_code1;
            $order->first_name2 = $first_name2;
            $order->last_name2 = $last_name2;
            $order->email2 = $email2;
            $order->phone_number2 = $phone_number2;
            $order->address2 = $address2;
            $order->address22 = $address22;
            $order->state2 = $state2;
            $order->city2 = $city2;
            $order->zip_code2 = $zip_code2;
            $order->order_status = "Successful";
            $order->payment_type = "COD";
            $order->payment_status = "Pending";

            $total_amount = 0;

            foreach($cart_arr as $row)
            {
                $total_amount += $row['product_attr']['price'] * $row['qty'];
            }

            $order->total_amount = $total_amount;

            $order->save();

            foreach($cart_arr as $row)
            {
                $orderdetails = new OrderDetails();

                $orderdetails->order_id = $order->id;
                $orderdetails->product_id = $row['product_id'];
                $orderdetails->product_attr_id = $row['product_attr_id'];
                $orderdetails->price = $row['product_attr']['price'];
                $orderdetails->qty = $row['qty'];

                $orderdetails->save();
                
                $product_attr = ProductAttri::find($row['product_attr_id']);
                $product_attr->stock = $product_attr->stock - $row['qty'];
                $product_attr->save();
                
            }

            $product_details = OrderDetails::join('products','products.id','=','order_details.product_id')
                                ->join('product_attris','product_attris.id','=','order_details.product_attr_id')
                                ->where(['order_id'=>$order->id])
                                ->select('*','order_details.price as order_details_price'
                                ,'order_details.qty as order_details_qty')
                                ->get();
                                
            Cart::where(['user_id'=>$user_id])->delete();

            $user['to'] = 'teamsnfsendriya@gmail.com';
            
            $data_admin = [
                'product_details' => $product_details,
                'first_name1' => $first_name1,
                'last_name1' => $last_name1,
                'email1' => $email1,
                'phone_number1' => $phone_number1,
                'address1' => $address1,
                'address21' => $address21,
                'state1' => $state1,
                'city1' => $city1,
                'zip_code1' => $zip_code1,
                'first_name2' => $first_name2,
                'last_name2' => $last_name2,
                'email2' => $email2,
                'phone_number2' => $phone_number2,
                'address2' => $address2,
                'address22' => $address22,
                'state2' => $state2,
                'city2' => $city2,
                'zip_code2' => $zip_code2,
                'total_amount' => $order->total_amount
            ];
            
            $data_customer = [
                'product_details' => $product_details,
                'total_amount' => $order->total_amount
            ];
        
            Mail::send(['html'=>'Sendmail/send_order_admin'],$data_admin,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('New Order');
            });
            
            $user['to'] = $email1;    
                
            Mail::send(['html'=>'Sendmail/send_order_user'],$data_customer,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('New Order');
            });
            
            $request->session()->put('order_id',$order->id);

            return redirect('order-successful');

            }
            catch(Exception $e)
            {
                return redirect('order-failure');
            }
        }
        else if($order_type == "Gateway")
        {
            $total_amount = 0;

            // foreach($cart_arr as $row)
            // {
            //     $total_amount += $row['product_attr']['price'] * $row['qty'];
            // }

            foreach($cart_arr as $row)
            {
                if($row['product']['is_available'])
                    $total_amount += $row['product_attr']['price'] * $row['qty'];
                else
                    $total_amount += ( $row['product_attr']['price'] * $row['qty'] * 20 ) / 100;
            }

            $result['first_name1'] = $request->first_name1;
            $result['last_name1'] = $request->last_name1;
            $result['email1'] = $request->email1;
            $result['phone_number1'] = $request->phone_number1;
            $result['address1'] = $request->address1;
            $result['address21'] = $request->address21;
            $result['state1'] = $request->state1;
            $result['city1'] = $request->city1;
            $result['zip_code1'] = $request->zip_code1;
            $result['first_name2'] = $request->first_name2;
            $result['last_name2'] = $request->last_name2;
            $result['email2'] = $request->email2;
            $result['phone_number2'] = $request->phone_number2;
            $result['address2'] = $request->address2;
            $result['address22'] = $request->address22;
            $result['state2'] = $request->state2;
            $result['city2'] = $request->city2;
            $result['zip_code2'] = $request->zip_code2;  
            $result['total_amount'] = $total_amount;

            return view("Frontend/payment",$result);
        }
    }

    public function order_successful(Request $request)
    {
        $order_id = $request->session()->get('order_id');
        $request->session()->forget('order_id');   
        
        $heading = "Order Placed Successfully";
        $message = "Order has been placed successfully";
        $message_type = 1;
        return view("Frontend/order_statistics",compact('heading','message','message_type','order_id'));
    }

    public function order_failure()
    {
        $heading = "Order Failed";
        $message = "Order has not been placed successfully";
        $message_type = 2;
        return view("Frontend/order_statistics",compact('heading','message','message_type'));
    }
    
    public function invoice($id)
    {
        $order = Order::find($id);

        $product_details = OrderDetails::join('products','products.id','=','order_details.product_id')
                                        ->join('product_attris','product_attris.id','=','order_details.product_attr_id')
                                        ->where(['order_id'=>$id])
                                        ->select('*','order_details.price as order_details_price'
                                        ,'order_details.qty as order_details_qty')
                                        ->get();

        return view("Backend/user/invoice",compact('order','product_details'));
    }

    public function payment_process(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('PRIVATE_KEY'), env('SECRET_KEY'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                $order_type = $request->order_type;
                $first_name1 = $request->first_name1;
                $last_name1 = $request->last_name1;
                $email1 = $request->email1;
                $phone_number1 = $request->phone_number1;
                $address1 = $request->address1;
                $address21 = $request->address21;
                $state1 = $request->state1;
                $city1 = $request->city1;
                $zip_code1 = $request->zip_code1;
                $first_name2 = $request->first_name2;
                $last_name2 = $request->last_name2;
                $email2 = $request->email2;
                $phone_number2 = $request->phone_number2;
                $address2 = $request->address2;
                $address22 = $request->address22;
                $state2 = $request->state2;
                $city2 = $request->city2;
                $zip_code2 = $request->zip_code2;

                $user_id = get_user_id();
                $cart = Cart::with('product','product_attr')->where(['user_id'=>$user_id])->get();
                $cart_arr = $cart->toArray();
                $is_available = true;

                foreach ($cart_arr as $key => $value) 
                {
                    if(!$value['product']['is_available'])
                    {
                        $is_available = false;
                        break;
                    } 
                }

                $order = new Order();

                $order->user_id = $user_id;
                $order->first_name1 = $first_name1;
                $order->last_name1 = $last_name1;
                $order->email1 = $email1;
                $order->phone_number1 = $phone_number1;
                $order->address1 = $address1;
                $order->address21 = $address21;
                $order->state1 = $state1;
                $order->city1 = $city1;
                $order->zip_code1 = $zip_code1;
                $order->first_name2 = $first_name2;
                $order->last_name2 = $last_name2;
                $order->email2 = $email2;
                $order->phone_number2 = $phone_number2;
                $order->address2 = $address2;
                $order->address22 = $address22;
                $order->state2 = $state2;
                $order->city2 = $city2;
                $order->zip_code2 = $zip_code2;
                $order->order_status = "Successful";
                $order->payment_type = "Gateway";
                if($is_available)
                {
                    $order->payment_status = "Success";
                }
                else
                {
                    $order->payment_status = "Pending";
                }
                $order->payment_id = $request->razorpay_payment_id;

                $total_amount = 0;

                // foreach($cart_arr as $row)
                // {
                //     $total_amount += $row['product_attr']['price'] * $row['qty'];
                // }

                foreach($cart_arr as $row)
                {
                    if($row['product']['is_available'])
                        $total_amount += $row['product_attr']['price'] * $row['qty'];
                    else
                        $total_amount += ( $row['product_attr']['price'] * $row['qty'] * 20 ) / 100;
                }

                $order->total_amount = $total_amount;

                $order->save();

                foreach($cart_arr as $row)
                {
                    $orderdetails = new OrderDetails();

                    $orderdetails->order_id = $order->id;
                    $orderdetails->product_id = $row['product_id'];
                    $orderdetails->product_attr_id = $row['product_attr_id'];

                    if($row['product']['is_available'])
                    {
                        $orderdetails->price = $row['product_attr']['price'];
                        $orderdetails->payment_status = 'Success';
                    }
                    else
                    {
                        $orderdetails->price = $row['product_attr']['price'];
                        $orderdetails->payment_status = 'Pending';
                    }
                    
                    $orderdetails->qty = $row['qty'];
                    $orderdetails->save();
                    
                    
                    $product_attr = ProductAttri::find($row['product_attr_id']);
                    $product_attr->stock = $product_attr->stock - $row['qty'];
                    $product_attr->save();
                }
                
                Cart::where(['user_id'=>$user_id])->delete();
                
                $product_details = OrderDetails::join('products','products.id','=','order_details.product_id')
                                ->join('product_attris','product_attris.id','=','order_details.product_attr_id')
                                ->where(['order_id'=>$order->id])
                                ->select('*','order_details.price as order_details_price'
                                ,'order_details.qty as order_details_qty')
                                ->get();
                $user['to'] = 'teamsnfsendriya@gmail.com';
            
                $data_admin = [
                    'product_details' => $product_details,
                    'first_name1' => $first_name1,
                    'last_name1' => $last_name1,
                    'email1' => $email1,
                    'phone_number1' => $phone_number1,
                    'address1' => $address1,
                    'address21' => $address21,
                    'state1' => $state1,
                    'city1' => $city1,
                    'zip_code1' => $zip_code1,
                    'first_name2' => $first_name2,
                    'last_name2' => $last_name2,
                    'email2' => $email2,
                    'phone_number2' => $phone_number2,
                    'address2' => $address2,
                    'address22' => $address22,
                    'state2' => $state2,
                    'city2' => $city2,
                    'zip_code2' => $zip_code2,
                    'total_amount' => $order->total_amount
                ];
            
                $data_customer = [
                    'product_details' => $product_details,
                    'total_amount' => $order->total_amount
                ];
            
                Mail::send(['html'=>'Sendmail/send_order_admin'],$data_admin,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('New Order');
                });
                
                $user['to'] = $email1;    
                
                Mail::send(['html'=>'Sendmail/send_order_user'],$data_customer,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('New Order');
                });

  
            } catch (Exception $e) {
                //return  $e->getMessage();
                return response()->json([
                    'status' => 400
                ]);
            }
        }
        
        $request->session()->put('order_id',$order->id);
        
        return response()->json([
            'status' => 200
        ]);
    }

    public function pending_payment(Request $request)
    {
        $order_id = $request->order_id;
        $pending_amount = $request->pending_amount;
        $order = Order::find($order_id);
        $first_name1 = $order->first_name1;
        $email1 = $order->email1;
        $phone_number1 = $order->phone_number1;
        return view("Frontend/pending_payment",compact('order_id','pending_amount','first_name1','email1','phone_number1'));
    }

    public function pending_payment_process(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('PRIVATE_KEY'), env('SECRET_KEY'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                $order_id = $request->order_id;
                
                $order = Order::find($order_id);
                $order->payment_status = 'Success';
                $order->total_amount = $order->total_amount + $request->amount;
                $order->payment_id = $order->payment_id.','.$input['razorpay_payment_id'];
                $order->save();

                $product_details = OrderDetails::join('products','products.id','=','order_details.product_id')
                                        ->join('product_attris','product_attris.id','=','order_details.product_attr_id')
                                        ->where(['order_id'=>$order_id])
                                        ->select('*','order_details.price as order_details_price'
                                        ,'order_details.qty as order_details_qty',
                                        'order_details.payment_status as order_details_payment_status')
                                        ->get();
                            
                $pending_amount = 0;
                foreach($product_details as $row)
                {
                    if($row->order_details_payment_status == 'Pending')
                    {
                        $pending_amount = ( $row->price * 80 ) / 100;
                        $orderdetails = OrderDetails::find($row->id);
                        $orderdetails->price = $orderdetails->price + $pending_amount;
                        $orderdetails->save();
                    }
                }
  
            } catch (Exception $e) {
                //return  $e->getMessage();
                return response()->json([
                    'status' => 400
                ]);
            }
        }
        
        $request->session()->put('order_id',$order_id);
        
        return response()->json([
            'status' => 200
        ]);
    }
}

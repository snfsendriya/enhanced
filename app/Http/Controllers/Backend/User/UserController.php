<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    Order,
    OrderDetails,
    User
};

use App\Rules\MatchedOldPassword;

class UserController extends Controller
{
    public function dashboard()
    {
        $total_orders = Order::where(['user_id'=>auth()->user()->id])->where(['payment_status'=>'Success'])->count();
        
        return view("Backend/user/dashboard",compact('total_orders'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect("login")->with("success","Logout Successfully");
    }

    public function all_order()
    {
        $all_order = Order::where(['user_id'=>auth()->user()->id])
                            // ->whereNotNULL('payment_id')
                            // ->orWhere('payment_type','=','COD')
                            ->orderBy('id','desc')
                            ->get();
        return view("Backend/user/all_order",compact('all_order'));
    }

    public function view_order($id)
    {
        $order = Order::find($id);

        $product_details = OrderDetails::join('products','products.id','=','order_details.product_id')
                                        ->join('product_attris','product_attris.id','=','order_details.product_attr_id')
                                        ->where(['order_id'=>$id])
                                        ->select('*','order_details.price as order_details_price'
                                        ,'order_details.qty as order_details_qty',
                                        'order_details.payment_status as order_details_payment_status')
                                        ->get();
                                        // dd($product_details->toArray());
        $actual_amount = 0;
        foreach($product_details as $row)
        {
            $actual_amount += $row->order_details_price * $row->order_details_qty;
        }
        
        $is_available = 1;
        foreach($product_details as $row)
        {
            if(!$row->is_available)
            {
                $is_available = 0;
                break;
            }
        }

        return view("Backend/user/view_order",compact('order','product_details','actual_amount','is_available'));
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
    
    public function account()
    {
        $user = User::find(auth()->user()->id);
        return view("Backend/user/account",compact('user'));
    }
    
    public function profile_process(Request $request)
    {
        $request->validate([
            'contact_number' => 'required|digits:10'
        ]);
        
        $user = User::find(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->contact_number = $request->contact_number;
        
        if($request->hasFile('profile_pic')){
            $profile_image = rand().'.'.$request->profile_pic->extension();
            $request->file('profile_pic')->move(public_path('uploads/Profile/'), $profile_image);
            $user->profile_pic = $profile_image;
        }
        
        $user->save();
        
        return redirect('user/account')->with('success','Profile has been updated successfully');
    }
    
    function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchedOldPassword],
            'new_password' => 'required|min:8',
            'retype_new_password' => 'required|same:new_password|min:8'
            
        ]);
        
        $password = Hash::make($request->post('new_password'));
        $res = User::find(auth()->user()->id)->update(['password'=>$password]);
        
       return redirect('user/account')->with('success','Password has been changed successfully');
    }
    
    function remove_profile_pic(Request $request)
    {
        $user = auth()->user();
        $user_id = $user->id;
        
        $userprofilepic = User::find($user_id);
        
        unlink(public_path('uploads/Profile/'.$userprofilepic->profile_pic));
        
        $userprofilepic->profile_pic = NULL;
        
        $userprofilepic->save();
        
        return redirect('user/account')->with('success','User profile picture has been removed successfully');
    }
}

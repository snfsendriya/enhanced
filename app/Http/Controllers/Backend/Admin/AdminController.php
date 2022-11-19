<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    Order,
    OrderDetails,
    Donate,
    User,
    Contact
};
use App\Rules\MatchedOldPassword;

class AdminController extends Controller
{
    public function index()
    {
        if(auth()->user())
        {
            return redirect("admin/dashboard");
        }
        else
        {
            return view("Backend/admin/login");   
        }
    }

    public function dashboard()
    {
        $users_count = User::where('id','!=',1)->count();
        $total_sales = Order::where(['payment_status'=>'Success'])->sum('total_amount');
        $total_donation = Donate::where('payment_id','!=',null)->sum('amount');
        $total_contact = Contact::count();
        
        return view("Backend/admin/dashboard",compact('users_count','total_sales','total_donation','total_contact'));
    }

    public function auth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password,'role' => 1])) {
            
            if($request->rememberme)
            {
                setcookie('login_email',$email,time()+60*60*24*100);
                setcookie('login_pwd',$password,time()+60*60*24*100);
            }
            
            return redirect("admin/dashboard");
        }
        else
        {
            return redirect("admin")->with("error","Invalid Credentials");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("admin")->with("success","Logout Successfully");
    }

    public function all_order()
    {
        $all_order = Order::whereNotNULL('payment_id')
                            ->orWhere('payment_type','=','COD')
                            ->orderBy('id','desc')
                            ->get();
        
        return view("Backend/admin/all_order",compact('all_order'));
    }

    public function view_order($id)
    {
        $order = Order::find($id);

        $product_details = OrderDetails::join('products','products.id','=','order_details.product_id')
                                        ->join('product_attris','product_attris.id','=','order_details.product_attr_id')
                                        ->where(['order_id'=>$id])
                                        ->select('*','order_details.price as order_details_price'
                                        ,'order_details.qty as order_details_qty')
                                        ->get();
                                        // dd($product_details->toArray());
        $actual_amount = 0;
        foreach($product_details as $row)
        {
            $actual_amount += $row->order_details_price * $row->order_details_qty;
        }

        return view("Backend/admin/view_order",compact('order','product_details','actual_amount'));
    }

    public function change_payment_status($id,$payment_status)
    {
        $order = Order::find($id);
        $order->payment_status = $payment_status;
        $order->save();

        return redirect()->back()->with('success','Payment status has been changed successfully');
    }

    public function delete_order($id)
    {
        Order::find($id)->delete();

        return redirect('admin/all-order')->with('success','Order has been deleted successfully');
    }

    public function all_donation()
    {
        $all_donation = Donate::whereNotNULL('payment_id')
                                ->orderBy('id','desc')
                                ->get();
        
        return view("Backend/admin/all_donation",compact('all_donation'));
    }

    public function view_donation($id)
    {
        $donation = Donate::find($id);

        return view("Backend/admin/view_donation",compact('donation'));
    }

    public function delete_donation($id)
    {
        Donate::find($id)->delete();

        return redirect('admin/all-donation')->with('success','One Donation has been deleted successfully');
    }
    
    public function all_user()
    {
        $all_user = User::where('id','!=',1)->orderBy('id','desc')->get();
        return view("Backend/admin/all_user",compact('all_user'));
    }
    
    public function change_user_status($id,$status)
    {
        $user = User::find($id);
        $user->status = $status;
        $user->save();

        return redirect('admin/all-user')->with('success','User status has been changed successfully');
    }

    public function delete_user($id)
    {
        $user = User::find($id);

        if($user->profile_pic)
        {
             unlink(public_path('uploads/Profile/'.$user->profile_pic));
        }

        $user->delete();

        return redirect('admin/all-user')->with('success','User has been deleted successfully');
    }
    
    public function account()
    {
        $user = User::find(1);
        return view("Backend/admin/account",compact('user'));
    }
    
    public function profile_process(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required|digits:10'
        ]);
        
        $user = User::find(1);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->contact_number = $request->contact_number;
        
        if($request->hasFile('profile_pic')){
            $profile_image = rand().'.'.$request->profile_pic->extension();
            $request->file('profile_pic')->move(public_path('uploads/Profile/'), $profile_image);
            $user->profile_pic = $profile_image;
        }
        
        $user->save();
        
        return redirect('admin/account')->with('success','Profile has been updated successfully');
    }
    
    function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchedOldPassword],
            'new_password' => 'required|min:8',
            'retype_new_password' => 'required|same:new_password|min:8'
            
        ]);
        
        $password = Hash::make($request->post('new_password'));
        $res = User::find(1)->update(['password'=>$password]);
        
       return redirect('admin/account')->with('success','Password has been changed successfully');
    }
    
    public function contact()
    {
        $all_contact = Contact::orderBy('id','desc')->get();
        return view("Backend/admin/contact",compact('all_contact'));
    }
    
    public function view_contact($id)
    {
        $contact = Contact::find($id);
        return view("Backend/admin/view_contact",compact('contact'));
    }
    
    public function delete_contact($id)
    {
        Contact::find($id)->delete();

        return redirect('admin/contact')->with('success','Contact has been deleted successfully');
    }
    
    public function change_pass()
    {
        $password = Hash::make('Admin@2022');
        User::find(1)->update(['password'=>$password]);
    }
    
    function remove_profile_pic(Request $request)
    {
        $user = auth()->user();
        $user_id = $user->id;
        
        $userprofilepic = User::find($user_id);
        
        unlink(public_path('uploads/Profile/'.$userprofilepic->profile_pic));
        
        $userprofilepic->profile_pic = NULL;
        
        $userprofilepic->save();
        
        return redirect('admin/account')->with('success','User profile picture has been removed successfully');
    }
}

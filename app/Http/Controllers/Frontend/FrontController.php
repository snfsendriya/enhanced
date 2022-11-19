<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\{
    User,
    Product,
    Cart,
    Order,
    Donate,
    News,
    Blog,
    ProductComment,
    BlogComment,
    Contact,
    Banner
};
use Razorpay\Api\Api;
use Exception;
use Artisan;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Mail\{
    TestMail,
    ContactMail
};

class FrontController extends Controller
{
    public function index()
    {
        // $instagram = \InstagramScraper\Instagram::withCredentials('snf_sendriya', 'Snfsendriya@1234');
        // $account = $instagram->searchAccountsByUsername('snf_sendriya');
        // $accountMedias = $account->getMedias(); 
        
        $all_banner = Banner::where(['status'=>1])->get();
        $latest_products = Product::where(['status'=>1,'is_available'=>1])->latest()->take(8)->get();

        return view('Frontend.index',compact('latest_products','all_banner'));
    }

    public function product($slug='')
    {
        if($slug == '')
        {
            $product = Product::where(['status'=>1])->orderBy('id','desc')->get();
            return view('Frontend.product',compact('product'));
        }
        else
        {
            $product = Product::where(['slug'=>$slug])->get();
            $productcomments = ProductComment::where(['product_id'=>$product[0]->id])->get();
            return view('Frontend.product_details',compact('product','productcomments'));
        }
    }

    public function cart()
    {
        if(auth()->check() || session()->get('session_id'))
        {
            $user_id = get_user_id();
            
            $cart = Cart::with('product','product_attr')->where(['user_id'=>$user_id])->get();
            $cart_arr = $cart->toArray();
        }
        else
        {
            $cart_arr = [];
        }
        return view('Frontend.cart',compact('cart_arr'));
    }

    public function checkout()
    {
        $user_id = get_user_id();
        $cart = Cart::where(['user_id'=>$user_id])->get();
        if(!isset($cart[0]))
        {
            return redirect('/');
        }
        $pre_book = 0;
        $cart = Cart::with('product','product_attr')->where(['user_id'=>$user_id])->get();
        $cart_arr = $cart->toArray();
        //dd($cart_arr);
        foreach($cart_arr as $row)
        {
            if(!$row['product']['is_available'])
            {
                $pre_book = 1;
                break;
            }
        }
        return view('Frontend.checkout',compact('cart_arr','pre_book'));
    }

    public function add_product()
    {
        return "Add Product";
    }

    public function register()
    {
        return view("Frontend/register");
    }

    public function login()
    {
        if(auth()->check())
        {
            return redirect('user/dashboard');
        }
        else
        {
            return view("Frontend/login"); 
        }
    }

    public function register_post(Request $request)
    {
        $request->validate([
            "first_name" => 'required',
            'last_name' => 'required',
            'contact_number' => 'required|digits:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirmation' => ['required','same:password']
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2
        ]);

        return redirect('login')->with('success','Registration Successful! You can login into your account');
    }

    public function login_process(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password,'role' => 2,'status'=>1])) {
            
            if($request->rememberme)
            {
                setcookie('login_user_email',$email,time()+60*60*24*100);
                setcookie('login_user_pwd',$password,time()+60*60*24*100);
            }
            
            return redirect("/");
        }
        else
        {
            return redirect("login")->with("error","Invalid Credentials");
        }
    }

    public function donate()
    {
        return view("Frontend/donate");
    }

    public function donate_process(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|digits:10',
            'amount' => 'required'
        ]);

        $result['first_name'] = $request->first_name;
        $result['last_name'] = $request->last_name;
        $result['email'] = $request->email;
        $result['email'] = $request->email;
        $result['phone_number'] = $request->phone_number;
        $result['amount'] = $request->amount;
        $result['note'] = $request->note;

        return view("Frontend/donate_payment",$result);
    }

    public function donate_gateway_process(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('PRIVATE_KEY'), env('SECRET_KEY'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                $first_name = $request->first_name;
                $last_name = $request->last_name;
                $email = $request->email;
                $phone_number = $request->phone_number;
                $amount = $request->amount;
                $note = $request->note;

                $donate = new Donate();

                $donate->first_name = $first_name;
                $donate->last_name = $last_name;
                $donate->email = $email;
                $donate->phone_number = $phone_number;
                $donate->amount = $amount;
                $donate->note = $note;
                $donate->payment_id = $request->razorpay_payment_id;

                $donate->save();

            } catch (Exception $e) {
                //return  $e->getMessage();
                return response()->json([
                    'status' => 400
                ]);
            }
        }
        
        return response()->json([
            'status' => 200
        ]);
    }

    public function donate_successful()
    {
        $heading = "Donate Successfully";
        $message = "Your donation has been done successfully. Thank you";
        $message_type = 1;
        return view("Frontend/donate_statistics",compact('heading','message','message_type'));
    }

    public function donate_failure()
    {
        $heading = "Donate Failed";
        $message = "Sorry! your donation has been failed";
        $message_type = 2;
        return view("Frontend/donate_statistics",compact('heading','message','message_type'));
    }

    public function news($slug='')
    {
        if($slug == '')
        {
            $all_news = News::where(['status'=>1])->orderBy('id','desc')->get();

            return view("Frontend/news",compact('all_news'));
        }
        else
        {
            $news = News::where(['slug'=>$slug,'status'=>1])->get();

            if(!isset($news[0]))
            {
                return redirect("/");
            }

            return view("Frontend/news_details",compact('news'));
        }
    }

    public function blogs($slug='')
    {
        if($slug == '')
        {
            $all_blog = Blog::where(['status'=>1])->orderBy('id','desc')->get();

            $lastest_blogs = Blog::latest()->take(5)->get();

            return view("Frontend/blog",compact('all_blog','lastest_blogs'));
        }
        else
        {
            $blog = Blog::where(['slug'=>$slug,'status'=>1])->get();

            $lastest_blogs = Blog::latest()->take(5)->get();

            if(!isset($blog[0]))
            {
                return redirect("/");
            }
            
            $blogcomments = BlogComment::where(['blog_id'=>$blog[0]->id])->get();

            return view("Frontend/blog_details",compact('blog','lastest_blogs','blogcomments'));
        }
    }

    public function contact_us()
    {
        return view("Frontend/contact");
    }

    public function about_us()
    {
        return view("Frontend/about_us");
    }

    public function our_story()
    {
        return view("Frontend/our_story");
    }

    public function our_project()
    {
        return view("Frontend/our_projects");
    }

    public function vision_mission()
    {
        return view("Frontend/vision_mission");
    }
    
    public function product_comment(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages()
            ]);
        }
        else
        {
            ProductComment::create([
                'product_id' => $request->product_id,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment
            ]);
        }
        
        return response()->json([
            'status' => 200    
        ]);
    }
    
    public function blog_comment(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'comment' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages()
            ]);
        }
        else
        {
            BlogComment::create([
                'blog_id' => $request->blog_id,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment
            ]);
        }
        
        return response()->json([
            'status' => 200    
        ]);
    }
    
    public function contact_process(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);
        
        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'subject' => $request->subject,
        //     'msg' => $request->message
        // ];
        
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'msg' => $request->message
        ];
        
        // $user['to'] = 'teamsnfsendriya@gmail.com';
        
        // Mail::send('Sendmail/contact_us_mail',$data,function($messages) use ($user){
        //     $messages->to($user['to']);
        //     $messages->subject('New Contact');
        // });
        
        Mail::to("teamsnfsendriya@gmail.com")->send(new ContactMail($details));
        
        return redirect('contact-us')->with('success','Your message has been sent successfully');
    }
    
    public function privacy_policy()
    {
        return view("Frontend/privacy_policy");
    }
    
    public function terms_and_conditions()
    {
        return view("Frontend/terms_and_conditions");
    }
    
    public function refund_policy()
    {
        return view("Frontend/refund_policy");
    }
    
    public function forgot_password()
    {
        return view("Frontend/forgot_password"); 
    }
    
    public function forgot_password_process(Request $request)
    {
        $email = $request->email;
        
        $user = User::where(['email'=>$email])->get();
        
        if(isset($user[0]))
        {
            date_default_timezone_set('Asia/Kolkata');
            
            $token = Str::random(60);
            
            $data = [
                'name' => $user[0]->first_name,
                'token' => $token
            ];
            
            $user['to'] = $email;
            
            Mail::send('Sendmail/forget_password',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('Reset Password');
            });
            
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => date('Y-m-d h:i:s')
            ]);
            
           return redirect('forgot-password')->with('success','An email regarding reset password has been sent to your email ID'); 
        }
        else
        {
           return redirect('forgot-password')->with('error','Email ID does not exist'); 
        }
    }
    
    public function reset_password($token)
    {
        $password_reset = DB::table('password_resets')->where(['token'=>$token])->get();
        
        if(isset($password_reset[0]))
        {
            $email = $password_reset[0]->email;
            
            date_default_timezone_set('Asia/Kolkata');
            
            $startTime = strtotime($password_reset[0]->created_at);
            
            $finishTime = strtotime(date('Y-m-d h:i:s'));
            
            $totalDuration = $finishTime - $startTime;
            
            if($totalDuration > 1800)
            {
                return redirect('/')->with('error','Link expired'); 
            }
            else
            {
                return view("Frontend/reset_password",compact('email','token')); 
            }
        }
        else
        {
            return redirect('/')->with('error','Invalid Token'); 
        }
    }
    
    public function reset_password_process(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password|min:8'
            
        ]);
        
        $password_reset = DB::table('password_resets')->where(['token'=>$request->token])->get();
        
        $password = Hash::make($request->password);
        
        $user = User::where(['email'=>$password_reset[0]->email])->get();
        
        User::where(['email'=>$password_reset[0]->email])->update(['password'=>$password]);
        
        if($user[0]->role == 1)
        {
            return redirect('/admin')->with('success','Password has been reset successfully');
        }
        else if($user[0]->role == 2)
        {
            return redirect('/login')->with('success','Password has been reset successfully');
        }
    }
    
    public function send_mail()
    {
        $details = [
            'title' => 'Sample Title',
            'body' => 'Sample Body'
        ];
        
        Mail::to("souravsaha964@gmail.com")->send(new TestMail($details));
        
        echo "<h2>Mail sent successfully</h2>";
    }
}

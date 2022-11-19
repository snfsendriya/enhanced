<?php
    use App\Models\Cart;
    
    function get_cart_totals()
    {
        if(auth()->check() || session()->get('session_id'))
        {
            if(auth()->check())
            {
                $user_id = auth()->user()->id;   
            }
            else
            {
                $user_id = session()->get('session_id');   
            }

            $total_cart_items = Cart::where(['user_id'=>$user_id])->sum('qty');

            return $total_cart_items;
        }
        else
        {
            return 0;
        }
    }
    
    function get_user_id()
    {
        if(auth()->check())
        {
            $user_id = auth()->user()->id;
        }
        else
        {
            if(!session()->has('session_id'))
            {
                $rand = rand('111111111','999999999');
                session()->put('session_id',$rand);
            }
            
            $user_id = session()->get('session_id');
        }
        
        return $user_id;
    }
?>
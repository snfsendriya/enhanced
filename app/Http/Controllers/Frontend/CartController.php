<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{
    Cart,ProductAttri
};
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $user_id = get_user_id();    
            
        $product_id = $request->product_id;
        $product_attr_id = $request->product_attr_id;
        $qty = $request->qty;
        $product_attr = ProductAttri::find($product_attr_id);
        
        $cart_qty = Cart::where(['user_id'=>$user_id,'product_id'=>$product_id,'product_attr_id'=>$product_attr_id])->sum('qty');
            
        if( ( $qty + $cart_qty ) > $product_attr->stock)
        {
            return response()->json([
                'status' => 400,
                'message' => 'Insufficient Stock!'
            ]);
        }
    
        $no_of_cart = Cart::where(['user_id'=>$user_id,
                    'product_id'=>$product_id,
                    'product_attr_id'=>$product_attr_id])->get();
    
        if(isset($no_of_cart[0]))
        {
            $cart = Cart::find($no_of_cart[0]->id);
            $message = "Cart updated successfully";
        }
        else
        {
            $cart = new Cart();
            $message = "Product added to cart successfully";
        }
    
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->product_attr_id = $product_attr_id;
        if(isset($no_of_cart[0]))
        {
            $cart->qty = $cart->qty + $qty;
        }
        else
        {
            $cart->qty = $qty;
        }
        $cart->save();
    
        //$product_attr->stock = $product_attr->stock - $qty;
        //$product_attr->save();
    
        $total_cart_items = Cart::where(['user_id'=>$user_id])->sum('qty');

        
        return response()->json([
            'status' => 200,
            'message' => $message,
            'total_cart_items' => $total_cart_items
        ]);
    }

    public function increment_cart(Request $request)
    {
        $cart_id = $request->cart_id;
        $product_attr_id = $request->product_attr_id;
        $qty = $request->qty;

        $product_attr = ProductAttri::find($product_attr_id);
        
        $cart = Cart::find($cart_id);
        
        if( ( $cart->qty + $qty ) > $product_attr->stock )
        {
            return response()->json([
                'status' => 400,
                'message' => 'Insufficient Stock!'
            ]);
        }

        $cart->qty = $cart->qty + $qty;
        $cart->save();

        return response()->json([
            'status' => 200,
            'message' => 'Cart updated successfully'
        ]);
    }

    public function decrement_cart(Request $request)
    {
        $cart_id = $request->cart_id;
        $product_attr_id = $request->product_attr_id;
        $qty = $request->qty;

        $cart = Cart::find($cart_id);
        $cart->qty = $cart->qty - $qty;
        $cart->save();

        return response()->json([
            'status' => 200,
            'message' => 'Cart updated successfully'
        ]);
    }

    public function delete_cart(Request $request)
    {
        $cart_id = $request->cart_id;
        $product_attr_id = $request->product_attr_id;
        $cart = Cart::find($cart_id);
       
        $cart->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Cart item deleted successfully'
        ]);
    }
}

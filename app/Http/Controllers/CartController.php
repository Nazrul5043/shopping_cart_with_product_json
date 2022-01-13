<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class CartController extends Controller
{

    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('frontend.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->product_id,
            'name' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image_url,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return \Cart::getTotalQuantity();
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->product_id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->product_id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function checkout(Request $request)
     {
        if( \Cart::getTotalQuantity()<1 ){
            return response()->json(['failed'=>'your card is empty']);
            session()->flash('message', 'your card is empty.');
        }
        try{
            DB::transaction(function () {
                $order = new Order(
                                [
                                    'qty' => \Cart::getTotalQuantity(),
                                    'total' => \Cart::getTotal(),
                                    'user_id' => auth()->user()->id,
                                ]
                            );
                $order->save();
                foreach(\Cart::getContent() as $product) {
                    $getPriceSum = $product->quantity * $product->price;
                    $products[] = [
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'qty' => $product->quantity,
                        'price' => $product->price,
                        'total' => $getPriceSum,
                        'created_at' => date("Y-m-d H:i:s")
                    ];
                   
                }
                DB::table('order_product')->insert($products);
                
            });
            \Cart::clear();
            session()->flash('message', 'your order is successfull.');
            return response()->json(['success'=> 'success!']);
        }
        catch(Exception $e){
            return response()->json(['failed'=>$e]);
        }
     }
}

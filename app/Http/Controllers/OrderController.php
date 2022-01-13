<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        
        if ($request->ajax()) {
            
            $data = Order::where('user_id',auth()->user()->id)->get();
            return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions', function($data) {
                        return '<a href="get_order/'.$data->id.'" class="btn btn-info btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    })
                    ->rawColumns(['Actions'])
                    ->make(true);
        }

        return view('backend.orders');
    }


    /**
     * Display the specified resource.
     *
     * @param  $order_id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $order = DB::table('order_product')->where('order_id',$order_id)->get();
        return view('backend.order', compact('order'));
    }

   
}

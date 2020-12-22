<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::latest()->get();
         return response()->json($order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.addOrder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $orders = array(); //Order::create($request->all());

        $orders['customer_id'] = $request->customer_id;
        $orders['total_quantity'] = $request->total_quantity;
        $orders['total_cost'] = $request->total_cost;
        
        $get_order_id = DB::table('orders')->insertGetId($orders);
        
        $item = 0; //= $request->number_of_item;
        $order_details = array();

        //for ($i=0; $i < $item; $i++) { 
            $i=0;
            $order_details['order_id'] = $get_order_id;
            $order_details['product_id'] = $request->product_id[$i];
            $order_details['unit_price'] = $request->unit_price[$i];
            $order_details['quantity'] = $request->quantity[$i];

            DB::table('order_details')->insertGetId($order_details);
        //}
        

        
        return response()->json('Congrats! Your Order done.');
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //$order_id = $order->order_id;

        DB::table('order_details')->get();
            // ->join('orders')
            // ->select('order_details.*')
            // ->where('order_details.order_id'='orders.order_id')
            // ->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

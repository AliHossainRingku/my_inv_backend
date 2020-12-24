<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
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
        // $order = Order::latest()->get();
        //  return response()->json($order);

          $all_order_info = DB::table('orders')
            ->join('order_details','orders.id','=','order_details.order_id')
            ->join('products','products.id','=','order_details.product_id')
            ->select('orders.*','order_details.*','products.*')
            ->orderByDesc('orders.id','orders.updated_at')
            ->get();

          return response()->json($all_order_info);
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
        $order = new Order;
        $order->customer_id = $request->customer_id;
        $order->total_quantity = $request->quantity;
        $order->total_cost = $request->unit_price;
        $order->save();

        $numberOfCartItems = $request->cart_items;

        //for($i=0; $i<$order->cart_items; $i++){ 
            $order_details = new OrderDetails;
            $order_details->order_id = $order->id;
            $order_details->product_id = $request->product_id;
            $order_details->unit_price = $request->unit_price;
            $order_details->quantity = $request->quantity;
            $order_details->save();
        //}

        return response()->json($order);
        
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

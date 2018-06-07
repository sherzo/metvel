<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Payment;
use App\Provider;
use App\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::all(),
            'sidebarActive' => 4
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $provider = Provider::findOrFail($request->provider_id);
        $payments = Payment::pluck('name', 'id');

        return view('orders.create', [
            'provider' => $provider,
            'payments' => $payments,
            'sidebarActive' => 4
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'code' => 0,
            'provider_id' => $request->provider_id,
            'payment_id' => $request->payment_id,
            'total' => 0,
        ]);

        foreach ($request->product_id as $key => $product_id) { 
            $product = Product::find($product_id);
            $product->stock += $request->quantity[$key];
            $product->save();
        }

        foreach ($request->product_id as $key => $product_id) {
            $order->products()->attach($product_id, [
                'amount' => $request->amount[$key],
                'quantity' => $request->quantity[$key]
            ]);
            
            $order->subtotal += $request->quantity[$key] * $request->amount[$key];
        }

        $order->iva = $order->subtotal * 0.12;
        $order->total = $order->subtotal + $order->iva;

        $order->save();

        return redirect('/orders')->with('success', 'Se registro la order de compra correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id); 

        $date = new Carbon($order->create_at);
        
        return view('orders.show', [
            'order' => $order,
            'date' => $date,
            'sidebarActive' => 4
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

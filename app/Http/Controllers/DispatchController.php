<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispatch;
use App\Shipping;
use App\Payment;
use App\Product;
use App\Client;
use Carbon\Carbon;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dispatches.index', [
            'dispatches' => Dispatch::all(),
            'sidebarActive' => 3
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client = Client::findOrFail($request->client_id);

        $shippings = Shipping::pluck('name', 'id');
        $payments = Payment::pluck('name', 'id');
        $products = Product::where('stock', '>', '0')->get();

        return view('dispatches.create', [
            'client' => $client,
            'shippings' => $shippings,
            'payments' => $payments,
            'products' => $products,
            'sidebarActive' => 3
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
        $dispatch = Dispatch::create([
            'code' => 0,
            'client_id' => $request->client_id,
            'payment_id' => $request->payment_id,
            'shipping_id' => $request->shipping_id,
            'subtotal' => 0,
            'iva' => 0,
            'total' => 0,
        ]);

        $dispatch->city_id = $request->city_id ? $request->city_id : null;
        $dispatch->address = $request->address ? $request->address : null;

        $error = false;

        foreach ($request->product_id as $key => $product_id) { 
            
            $product = Product::find($product_id);

            if($product->stock < $request->quantity[$key]){
                $error = true;
                break;
            }else {
                $product->stock -= $request->quantity[$key];
                $product->save();
            }
        }

        if($error) {
            return redirect('dispatches/create?client_id=' . $request->client_id)->with('danger', 'La cantidad ingresada es mayor al stock del producto ' . $product->name);
        }

        foreach ($request->product_id as $key => $product_id) {
            $dispatch->products()->attach($product_id, [
                'amount' => $request->amount[$key],
                'quantity' => $request->quantity[$key]
            ]);
            
            $dispatch->subtotal += $request->quantity[$key] * $request->amount[$key];
        }

        $dispatch->iva = $dispatch->subtotal * 0.12;
        $dispatch->total = $dispatch->subtotal + $dispatch->iva;

        $dispatch->save();

        return redirect('/dispatches')->with('success', 'Se registro el despacho correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispatch = Dispatch::find($id); 

        $date = new Carbon($dispatch->create_at);
        
        return view('dispatches.show', [
            'dispatch' => $dispatch,
            'date' => $date,
            'sidebarActive' => 3
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

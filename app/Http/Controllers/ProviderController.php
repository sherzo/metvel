<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Product;
use App\State;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('providers.index', [
            'providers' => Provider::all(),
            'sidebarActive' => 4
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $states = State::pluck('name', 'id');
        $products = Product::pluck('name', 'id');

        return view('providers.create', [
            'states' => $states,
            'products' => $products,
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
        $provivers = Provider::create($request->all());

        $provivers->products()->attach($request->products);

        return redirect('providers')->with('success', 'Se creo el proveedor correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('providers.show', [ 
            'provider' => Provider::findOrFail($id),
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
        return view('providers.edit', [
            'provider' => Provider::find($id),
            'sidebarActive' => 4
        ]);
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
        $provider = Provider::findOrFail($id);

        $provider->dni = $request->dni;
        $provider->name = $request->name;
        $provider->address = $request->address;
        $provider->phone = $request->phone;
        $provider->city_id = $request->city_id;

        $provider->save();

        $provider->products()->sync($request->products);

        return redirect()->back()->with('success', 'Se actualizo el proveedor correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect('providers');
    }
}

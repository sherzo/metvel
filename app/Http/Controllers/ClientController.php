<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\State;

class ClientController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index', [
            'clients' => Client::all(),
            'sidebarActive' => 3
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

        return view('clients.create', [
            'states' => $states,
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
        $client = client::create($request->all());

        return redirect('clients')->with('success', 'Se creo el cliente correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('clients.show', [ 
            'client' => client::findOrFail($id),
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
        return view('clients.edit', [
            'client' => Client::find($id),
            'sidebarActive' => 3
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
        $client = Client::findOrFail($id);

        $client->dni = $request->dni;
        $client->name = $request->name;
        $client->address = $request->address;
        $client->phone = $request->phone;

        if($request->city_id) {
            $client->city_id = $request->city_id;
        }

        $client->save();

        return redirect()->back()->with('success', 'Se actualizo el cliente correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::findOrFail($id);
        $client->delete();

        return redirect('clients');
    }
   
    /**
     * Get client data.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $client = Client::find($id);
        $client->load('city.state');
        
        return $client;
    }
}

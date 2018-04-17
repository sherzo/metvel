<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\State;
use App\Municipality;

class StateController extends Controller
{
    public function get()
    {
    	return State::pluck('name', 'id');
    }

    public function getCitiesAndMunicipalities($state_id)
    {
    	$cities = City::where('state_id', $state_id)->get();

    	$municipalities = Municipality::where('state_id', $state_id)->get();
    	
    	return [
    		'cities' => $cities,
    		'municipalities' => $municipalities
    	];
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use App\User;
use App\Payment;
use App\Notifications\CreatedAccount;
use Hash;

class MaintenanceController extends Controller
{
    public function index()
    {
    	$shippings = Shipping::all();
    	$payments = Payment::all();
    	$users = User::all();

    	return view('maintenance.index', [
    		'sidebarActive' => 5,
    		'shippings' => $shippings,
    		'payments' => $payments,
    		'users' => $users
    	]);
    }

    public function usersCreate()
    {
    	return view('maintenance.create-user', [
            'sidebarActive' => 5
        ]);
    }

    public function usersStore(Request $request)
    {        
        $password = str_random(40);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        $user->notify(new CreatedAccount($user, $password));

        return redirect('maintenance');
    }

    public function shapeStore(Request $request)
    {
        $class = $request->shape;

        $shape = $class::create([
            'name' => $request->name,
        ]);

        return redirect('maintenance');
    }
}

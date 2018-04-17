<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parish;

class MunicipalityController extends Controller
{
    public function getParish($id)
    {
        return ['parish' => Parish::findOrFail($id)];
    }
}

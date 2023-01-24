<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkahuController extends Controller
{
    public function akahuauth()
    {
      return response()->json(['message' => 'For the time being, it can be a success or failure URI. Later on, we will separate success and failure URI.'],200);    
    }
}
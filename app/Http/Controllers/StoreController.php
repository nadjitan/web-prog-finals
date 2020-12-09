<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['guest']);
    // }

    public function index()
    {   
        $places = Place::orderBy('origin')->get();
        return view('layouts.store', [
            'places' => $places
        ]);
    }

    public function book($id) 
    {
        $place = Place::where('id', $id)->first();
        return $place;
    }
}

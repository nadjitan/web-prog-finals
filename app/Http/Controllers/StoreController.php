<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Place;
use App\Models\FlightTicket;
use Carbon\Traits\Timestamp;
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

    // Used for transfering data to book modal
    public function book($id) 
    {
        $place = Place::where('id', $id)->first();
        return $place;
    }

    public function storeFlightTicket(Request $request)
    {
        $request->user()->flights()->create([
            'user_id' => $request->user()->id,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'price' => $request->price,
            'full_name' => $request->full_name,
            'nationality' => $request->nationality,
            'gender' => $request->gender,
            'passport_number' => $request->passport_number,
            'surname' => $request->surname,
            'date_of_birth' => $request->date_of_birth,
            'passport_expiry_date' => $request->passport_expiry_date,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return back();
    }
}

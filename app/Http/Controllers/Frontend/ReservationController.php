<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function stepOne(){
        $reservations = Reservation::all();
        return view('reservations.step-one');
    }
}

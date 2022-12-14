<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Services\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation.index');
    }

    public function getAllReservation()
    {
        return view('reservation.all-reservation');
    }

    public function store(Request $request)
    {
        try {
            (new Reservation)->create($request);

            return back()->with('message', 'Reservations ajouté');
        } catch (\Exception $error) {
            return back()->withErrors($error->getMessage());
        }
    }
}

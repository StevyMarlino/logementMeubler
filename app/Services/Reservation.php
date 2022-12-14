<?php


namespace App\Services;


use App\Models\logement;
use App\Models\Reservation as ReservationCreate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Reservation
{
    public function create($data)
    {
        return  DB::transaction(function () use ($data) {
            $logement = logement::find($data->id_logement);

            $data['name'] = $logement->libelle;
            $data['unit_price'] = $logement->price;
            $data['type'] = $logement->type;

            $reservation = ReservationCreate::create([
                'client_name' => $data->client_name,
                'identification_card' => $data->identification_card,
                'immatriculation_number' => $data->immatriculation_number,
                'phone' => $data->phone,
                'apartment_number' => $logement->libelle,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays($data->nombreJours),
                'payment_status' => 'completer',
                'user_id' => Auth::user()->id
            ]);

            $data['reservation_id'] = $reservation->id;

            (new Invoice)->generate($data);

            return $reservation;
        });
    }
}

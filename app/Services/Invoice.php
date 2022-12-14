<?php


namespace App\Services;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice as InvoiceCreate;

class Invoice
{

    public function generate($data)
    {
      return  DB::transaction(function () use ($data) {
          return InvoiceCreate::create([
              'description' => 'Réservation '. $data->type .' '.$data->name,
              'invoice_number' => uniqid(),
              'reservation_id' => $data->reservation_id,
              'quantity' => $data->nombreJours,
              'unit_price' => $data->unit_price,
              'total_amount' => $data->unit_price * $data->nombreJours,
              'status_reservation' => 'complete',
              'user_id' => Auth::user()->id
          ]);
        });
    }
}

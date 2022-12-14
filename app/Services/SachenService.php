<?php


namespace App\Services;


use App\Models\liste_sachen;
use Illuminate\Support\Facades\DB;

class SachenService
{
    public function create($data)
    {
        return  DB::transaction(function () use ($data) {
            return liste_sachen::create([
                'name' => $data->libelle,
                'quantity' => $data->quantity,
                'logement_id' => $data->logement_id
            ]);
        });
    }
}

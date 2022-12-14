<?php


namespace App\Services;


use App\Models\logement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogementService
{
    public function create($data)
    {
        return  DB::transaction(function () use ($data) {
            return logement::create([
                'type' => $data->type,
                'libelle' => $data->libelle,
                'price' => $data->price,
                'image' => $data->image,
                'user_id' => Auth::user()->id
            ]);
        });
    }
}

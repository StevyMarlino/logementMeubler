<?php

namespace App\Http\Controllers;

use App\Services\SachenService;
use Illuminate\Http\Request;

class ListeSachenController extends Controller
{
    public function store(request $request)
    {
        (new SachenService)->create($request);

        return back()->with('message', 'Ustensile ajouter');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Services\Invoice;
use App\Models\Invoice as Facture;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $data = [
            'invoice' => Auth::user()->invoice
        ];
        return view('invoice.index', $data);
    }

    public function store(InvoiceRequest $request)
    {
        try {
            (new Invoice)->generate($request);

            return back()->with('message', 'Reservations ajouté');
        } catch (\Exception $error) {
            return back()->withErrors($error->getMessage());
        }
    }

    public function details($id)
    {
        $data = [
            'details' => Facture::find($id)
        ];
        return view('invoice.details',$data);
    }
}

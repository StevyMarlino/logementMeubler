<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'client_name' => 'required|string',
            'identification_card' => 'required|string',
            'immatriculation_number' => 'required|integer',
            'phone' => 'required|integer',
            'apartment_number' => 'required|integer',
            'nombreJours' => 'required|integer',
            'id_logement' => 'required|integer'
        ];
    }
}

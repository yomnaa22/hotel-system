<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'accompany_number' => 'bail|required|integer',
            'paid_price' => 'bail|required|integer',
            'room_number' => 'bail|required|min:4',
            'client_id' => 'bail|required',
        ];
    }
}

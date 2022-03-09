<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' => 'bail|required|string|max:20',
            'email' => 'bail|required|unique:clients',
            'mobile' => 'bail|string',
            'password' => 'bail|required|min:8',
            'country' => 'bail|required|string|nullable',
            'gender' => 'bail|required',
            'avatar_img' => 'bail|required|image|mimes:jpeg,png',
        ];
    }
}

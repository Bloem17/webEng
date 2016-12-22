<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
        $test = date("d.m.Y", strtotime("-1 week"));

        return [
            //
            'titel' => 'required|string',
            'select' => 'required|integer',
            'preis' => 'required|numeric|min:0',
            'datum' => 'required|date|after:'.$test


        ];
    }
}

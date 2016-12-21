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
            'titel' => 'required',
            'select' => 'required|integer',
            'preis' => 'required|numeric',
            'datum' => 'required|date|after:'.$test


        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeilnehmerRequest extends FormRequest
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
            //
            'vorname' => 'required|string|regex:/^[a-zA-Z\s]*$/',
            'nachname' => 'required|string|regex:/^[a-zA-Z\s]*$/',
            'strasse' => 'required|string|regex:/^[a-zA-Z\s]*$/',
            'strNr' => 'required|integer',
            'ort' => 'required|string|regex:/^[a-zA-Z\s]*$/',
            'plz' => 'required|integer'

                   

        ];
    }
}
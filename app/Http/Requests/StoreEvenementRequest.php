<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvenementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image'=>'required|image|mimes:png,jpg,svg',
            'lieux'=>'required',
            'titre'=>'required',
            'prix'=>'required',
            'durée'=>'required',
            'description'=>'required',
            'capacity'=>'required',
            'localisation'=>'required',
            'date' => [
                'required',
                'date',
                'after_or_equal:today' // Vérifie que la date est supérieure ou égale à la date d'aujourd'hui
            ],
            'categorie_id'=>'required',
          ];
    }
}

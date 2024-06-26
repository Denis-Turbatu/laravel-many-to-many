<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'min:10'],
            'thumb' => ['required'],
            'description' => ['required', 'min:20'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'type_id'=> ['nullable'],
            'technologies' => ['nullable', 'exists:technologies,id'],
        ];
    }

    public function messages()
    {
        return [
            // titolo
            'title.required' => 'Il titolo deve essere inserito',
            'title.min' => 'Il titolo deve contenere almeno 10 caratteri',

            // thumb
            'thumb.required' => "l'immagine deve essere inserita",

            // descrizione
            'description.required' => 'La descrizione deve essere inserita',
            'description.min' => 'La descrizione deve contenere almeno 20 caratteri',

            // data inizio
            'start_date.required' => 'La data di inizio progetto deve essere inserita',

            // data fine
            'end_date.required' => 'La data di fine progetto deve essere inserita',
            
            // tipo
            'type.required' => 'Il tipo deve essere inserito',
        ];
    }
}

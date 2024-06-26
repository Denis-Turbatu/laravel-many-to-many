<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnologyRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'color' => ['required'],
        ];
        
    }

    public function messages()
    {
        return [
            // nome
            'name.required' => 'Il nome deve essere inserito',
            'name.min' => 'Il nome deve contenere almeno 3 caratteri',

            // colore
            'color.required' => "il colore deve essere inserito",
        ];
    }
}

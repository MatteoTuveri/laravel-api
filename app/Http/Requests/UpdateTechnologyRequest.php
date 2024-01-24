<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTechnologyRequest extends FormRequest
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
            'name' => ['required','min:3', 'max:200',Rule::unique('technology')->ignore($this->technology)],
            'documentation' =>['nullable','url'],
            'icon' =>['nullable','image']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve avere almeno :min caratteri',
            'name.max' => 'Il nome deve avere massimo :max caratteri',
            'name.unique' => 'Questa tecnologia esiste già',
            'documentation.url' => 'Linkare la documentazione',
            'icon.image' => 'L\'immagine deve essere un file',
        ];
    }
}

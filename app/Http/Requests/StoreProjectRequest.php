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
            'title' => 'required',
            'image' => ['required'],
            'type_id' => 'required',
            'technologies' => ['required','array','exists:technologies,id']
        ];
    }
    public function messages(){

        return [
            'title.required' => 'Il campo del nome non puo essere vuoto!',
            'image.required' => 'Inserire un immagine',
            'type_id.required' => 'Inserire un tipo',
        ];
    }
}

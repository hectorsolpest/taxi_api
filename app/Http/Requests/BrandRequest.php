<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name'=>'required|min:3|max:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'El nombre es obligatorio',
            'name.min'=>'El nombre debe tener al menos 3 caracteres',
            'name.max'=>'El nombre debe tener menos de 50 caracteres',
        ];
    }
}

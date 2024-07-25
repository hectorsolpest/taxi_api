<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'phone'=>'required|integer',
            'address'=>'required|min:5'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'El nombre es obligatorio',
            'phone.required'=>'El telefono es obligatorio',
            'phone.number'=>'El telefono debe tener solo numeros',
            'address.required'=>'La direccion es obligatoria',
            'address.min'=>'La direccion debe tener al menos 10 caracteres',
        ];
    }
}

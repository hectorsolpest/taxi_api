<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxiRequest extends FormRequest
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
            'plate_number'=>'required|regex:/^[A-Z]{3}-[0-9]{4}$/',
            'year'=>'required|integer|digits:4',
            'brand_id'=>'required|exists:brands,id',
            'base_id'=>'required|exists:bases,id'
        ];
    }

    public function messages(): array
    {
        return [
            'plate_number.required' => 'El número de placa es requerido.',
            'plate_number.regex' => 'El formato del número de placa debe ser AAA-9999.',
            'year.required' => 'El año es requerido.',
            'year.integer' => 'El año debe ser un número entero.',
            'year.digits' => 'El año debe tener exactamente 4 dígitos.',
            'brand_id.required' => 'El ID de la marca es requerido.',
            'brand_id.exists' => 'El ID de la marca proporcionado no existe.',
            'base_id.required' => 'El ID base es requerido.',
            'base_id.exists' => 'El ID base proporcionado no existe.',
        ];
    }
}

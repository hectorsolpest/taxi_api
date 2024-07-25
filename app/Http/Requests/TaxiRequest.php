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
}

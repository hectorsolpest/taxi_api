<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class JourneyRequest extends FormRequest
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
            'origin'=>'required|min:5|max:50',
            'destiny'=>'required|min:5|max:50',
            'taxi_id'=>'required|exists:taxis,id',
            'start_datetime'=>'required|date_format:Y-m-d H:i:s',
            'end_datetime'=>'required|date_format:Y-m-d H:i:s'
        ];
    }

    public function messages(): array
    {
        return [
            'origin.required' => 'El origen es requerido.',
            'origin.min' => 'El origen debe tener al menos :min caracteres.',
            'origin.max' => 'El origen no puede exceder :max caracteres.',
            'destiny.required' => 'El destino es requerido.',
            'destiny.min' => 'El destino debe tener al menos :min caracteres.',
            'destiny.max' => 'El destino no puede exceder :max caracteres.',
            'taxi_id.required' => 'El ID del taxi es requerido.',
            'taxi_id.exists' => 'El ID del taxi proporcionado no existe.',
            'start_datetime.required' => 'La fecha/hora de inicio es requerida.',
            'start_datetime.date_format' => 'La fecha/hora de inicio debe tener el formato Y-m-d H:i:s.',
            'end_datetime.required' => 'La fecha/hora de fin es requerida.',
            'end_datetime.date_format' => 'La fecha/hora de fin debe tener el formato Y-m-d H:i:s.',
        ];
    }
}

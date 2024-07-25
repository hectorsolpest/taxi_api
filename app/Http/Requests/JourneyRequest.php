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
}

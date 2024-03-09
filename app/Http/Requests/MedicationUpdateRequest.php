<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicationUpdateRequest extends FormRequest
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
        $medication_id = $this->route('medication');
        return [
            'name' => 'required|string|unique:medications,name,' . (int)$medication_id.',id',
            'description' => 'required|string',
            'quantity' => 'numeric|min:0',
            'is_active' => 'boolean'
        ];
    }
}

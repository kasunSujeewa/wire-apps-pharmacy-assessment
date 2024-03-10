<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
        $customer_id = $this->route('customer');
        return [
            'name' => 'required|string',
            'mobile_no' => 'required|unique:customers,mobile_no,' . (int)$customer_id . ',id',
            'address' => 'string',
            'is_active' => 'boolean'
        ];
    }
}

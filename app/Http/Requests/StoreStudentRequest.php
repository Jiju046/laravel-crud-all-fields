<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'city_id' => 'required|exists:cities,id',
            'email' => 'required|email',
            'skills' => 'required|array|min:1',
            'gender' => 'required|in:male,female,others',
            'appointment' => 'required',
            'address' => 'required|max:200'
        ];
    }
}

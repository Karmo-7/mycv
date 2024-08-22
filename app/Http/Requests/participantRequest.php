<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class participantRequest extends FormRequest
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
            'firstname' => ['required','string','max:255'],
            'lastname' => ['required','string','max:255'],
            'gender' => ['required', 'string', 'in:male,female'],
            'phonenumber' => ['required', 'integer', 'unique:participants'],
            'email' => ['required', 'email', 'unique:participants'],
            'address' => ['required','string','max:255'],
            'date_of_birth' => ['required', 'date'],
            // 'sports_id' => ['required', 'exists:sports,id'],
        ];
    }
}

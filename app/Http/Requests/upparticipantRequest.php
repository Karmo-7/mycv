<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class upparticipantRequest extends FormRequest
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
            'firstname' => ['string','max:255'],
            'lastname' => ['string','max:255'],
            'gender' => [ 'string', 'in:male,female'],
            'phonenumber' => [ 'integer', 'unique:participants'],
            'email' => [ 'email', 'unique:participants'],
            'address' => ['string','max:255'],
            'date_of_birth' => [ 'date'],
        ];
    }
}

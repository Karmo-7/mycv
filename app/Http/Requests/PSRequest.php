<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PSRequest extends FormRequest
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
            'sports_id' => ['required', 'exists:sports,id'],
            'participants_id' => ['required', 'exists:participants,id'],
            'status' => [ 'string', 'in:active,not_active'],
            'subscriptionOne_price' => ['required','numeric',],
        ];
    }
}

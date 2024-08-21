<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class upPSRequest extends FormRequest
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
            'reason' => ['string','max:255'],
            'sports_id' => ['exists:sports,id'],
            'participants_id' => [ 'exists:participants,id'],
            'status' => [ 'string', 'in:active,not_active'],
            'subscriptionOne_price' => ['numeric',],

        ];
    }
}

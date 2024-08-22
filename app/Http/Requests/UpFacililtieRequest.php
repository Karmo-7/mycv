<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpFacililtieRequest extends FormRequest
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
          'TFacilities' => ['string', 'in:restrooms,lockerrooms,reception,buffet'],
          'sports_id' => ['exists:sports,id'],

        ];
    }
}

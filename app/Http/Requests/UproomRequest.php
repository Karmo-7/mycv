<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UproomRequest extends FormRequest
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
            'name' => [ 'string','max:255'],
            'area' => [ 'integer','min:50'],
            'sports_id' => [ 'exists:sports,id'],
        ];
    }
}

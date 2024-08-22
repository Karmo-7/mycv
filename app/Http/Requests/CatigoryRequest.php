<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatigoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
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
            'required-area' => ['required', 'string','max:255'],
            'required-age' => ['required', 'string','max:255'],



        ];
    }
}

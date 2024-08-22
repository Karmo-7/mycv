<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updiscountRequest extends FormRequest
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
            'ditails' => [ 'string'],
            'status' => [ 'string', 'in:active,not_active'],
            'dateline'=>[ 'integer'],
            'sold' => 'numeric|between:0,1',

        ];
    }
}

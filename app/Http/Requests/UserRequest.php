<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            's_level' => 'sometimes|integer',
            't_level' => 'sometimes|integer',
            'e_level' => 'sometimes|integer',
            'm_level' => 'sometimes|integer',
            'score' => 'sometimes|integer',
            'avatar' => 'required|integer',
        ];
    }
}
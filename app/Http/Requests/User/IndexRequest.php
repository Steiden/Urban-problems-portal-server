<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'second_name' => 'string',
            'first_name' => 'string',
            'patronymic' => 'string',
            'login' => 'string',
            'email' => 'string',
            'role_id' => 'integer|exists:roles,id',
        ];
    }
}

<?php

namespace App\Http\Requests\Book;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApiBookRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('books', 'title')->ignore($this->book)
            ],
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:0',
            'description' => 'required|string',
            'available_copies' => 'required|integer|min:0',
        ];
    }
}

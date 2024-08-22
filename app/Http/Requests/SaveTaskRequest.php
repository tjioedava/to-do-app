<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveTaskRequest extends FormRequest
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
            'description' => ['required', 'max:100'],
            'date' => ['required'],

            //inputted category name can be null or must exists in the category table 
            'category' => ['nullable', Rule::exists('category', 'name')],
        ];
    }

    //rules' corresponding messages
    public function messages(): array
    {
        return [
            'category.exists' => 'The selected category is not existent in our records. Perhaps it has been deleted or edited?',
        ];
    }
}

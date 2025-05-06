<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'author'=> 'required|string|max:255',
            'description'=> 'required|string',
            'category_id'=> 'required|exists:categories,id',
        ];

        if ($this->isMethod('post')) {
            $rules['cover'] = 'required|image|mimes:jpeg,png|max:2048';
        } else {
            $rules['cover'] = 'nullable|image|mimes:jpeg,png|max:2048';
        }

        return $rules;
    }
}

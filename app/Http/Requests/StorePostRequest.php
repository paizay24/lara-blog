<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|min:5|unique:posts,title',
            'description' => 'required|min:10',
            "category" => "required|exists:categories,id",
            'featured_image' => 'nullable|mimes:png,jpg,jpeg|file|max:512',
            'photos' => 'required',
            'photos.*' => 'mimes:png,jpg,jpeg|file|max:512'
        ];
    }
}

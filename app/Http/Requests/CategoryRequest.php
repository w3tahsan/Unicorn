<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_name' => 'required|string|unique:categories|min:3|max:15',

        ];
    }
    public function messages()
    {
        return [
            'category_name.required' => 'Category Name Dite Hobe',
            'category_name.string' => 'Category Name Mim  string dite hobe',
            'category_name.unique' => 'Category Name Already Ace',
            'category_name.min' => 'Category Name Mim 3 chracter dite hobe',
            'category_name.max' => 'Category Name Max 15 chracter dite hobe',


        ];
    }
}

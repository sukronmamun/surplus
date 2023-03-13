<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'Description' => 'required|min:3',
            'enable' => 'required|boolean',
            'categories' => 'required|array',
            'images' => 'required|array',
            'categories.id' => 'array',
            'images.id' => 'array'
        ];

        
    }
}

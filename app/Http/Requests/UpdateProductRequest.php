<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    /* reglas update product request */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:products,name,'.$this->product->id,
            'description' => 'required|max:5000',
            'image_path' => 'required|image|mimes:png,jpg|max:2048'
        ];
    }
    /* update product request */
    public function messages()
    {
        return [
            'image_path.max' => 'The thumbail must not be greater than 2mb',
            'image_path.image' => 'The thumbail must be an image.',
            'image_path.mimes' => 'The thumbail must be of type png or jpg'
        ];
    }


}

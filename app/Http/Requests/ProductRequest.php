<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'base_price' => [
                'required',
                'numeric',
            ],
            'discount_price' => [
                'nullable',
                'numeric',
                'lt:base_price',
            ],
            'description' => [
                'required',
                'string',
                'max:65535'
            ],
        ];
    }
}

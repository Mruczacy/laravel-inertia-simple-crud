<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
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

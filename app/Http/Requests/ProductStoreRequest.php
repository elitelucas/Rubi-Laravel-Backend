<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'long_description' => ['required', 'string'],
            'category_id' => ['required', 'integer', 'exists:product_categories,id'],
            'active' => ['required'],
            'affiliate_price' => ['nullable', 'numeric'],
            'affiliate_monthly_price' => ['nullable', 'numeric'],
            'affiliate_annual_price' => ['nullable', 'numeric'],
            'retail_price' => ['nullable', 'numeric'],
            'retail_monthly_price' => ['nullable', 'numeric'],
            'retail_annual_price' => ['nullable', 'numeric'],
            'recurring' => ['required'],
            'qv' => ['required', 'numeric'],
            'cv' => ['required', 'numeric'],
            'pv' => ['required', 'numeric'],
            'qc' => ['required', 'numeric'],
            'ac' => ['required', 'numeric'],
        ];
    }
}

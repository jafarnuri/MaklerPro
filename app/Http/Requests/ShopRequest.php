<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class ShopRequest extends FormRequest
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
            'user_id' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'area' => 'nullable|numeric',
            'area_unit' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'nullable|string|max:50',
            'sale_type' => 'nullable|string|max:50|in:sale,rent',
            'owner_name' => 'nullable|string|max:255',
            'owner_contact' => 'nullable|string|max:255',
            'faiz_derecesi' => 'nullable|numeric|min:0|max:100',
            'makler_pulu' => 'nullable|numeric|min:0',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
           'sirketin_pulu' => 'nullable|numeric|min:0',
            'makler_faiz' => 'nullable|numeric|min:0|max:100',
        ];
                        // `update` əməliyyatı üçün "required" olmayan validasiya
                        if ($this->isMethod('put') || $this->isMethod('patch')) {
                            foreach ($rules as $field => $rule) {
                                $rules[$field] = str_replace('required', 'sometimes', $rule); // "required"-i "sometimes"-lə əvəz edir
                            }
                        }
    }
    
    public function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->json([
        'errors' => $validator->errors(),
    ], 422));
}
}

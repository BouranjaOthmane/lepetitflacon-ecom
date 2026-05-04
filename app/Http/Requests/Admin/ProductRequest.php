<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $productId = $this->route('product');

        return [
            'category_id' => 'required|exists:categories,id',
            'name.en' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0|gt:purchase_price',
            'purchase_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'sku' => 'nullable|string|unique:products,sku,' . $productId,
            'stock_quantity' => 'nullable|integer|min:0',
            'low_stock_threshold' => 'nullable|integer|min:0',
            'gender' => 'required|in:Men,Women,Unisex,Kids',
            'is_featured' => 'nullable|boolean',
            'is_bestseller' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
            'gallery.*' => 'nullable|image|max:2048',
            'top_notes' => 'nullable|array',
            'top_notes.*' => 'exists:fragrance_notes,id',
            'middle_notes' => 'nullable|array',
            'middle_notes.*' => 'exists:fragrance_notes,id',
            'base_notes' => 'nullable|array',
            'base_notes.*' => 'exists:fragrance_notes,id',

            // product sizes
            'sizes' => 'nullable|array',
            'sizes.*.size' => 'required_with:sizes.*.price|string|max:50',
            'sizes.*.price' => 'required_with:sizes.*.size|numeric|min:0',
            'sizes.*.stock_quantity' => ['required_with:sizes', 'integer', 'min:0'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $sizes = collect($this->input('sizes', []))
            ->filter(function ($item) {
                return !empty($item['size']) || !empty($item['price']);
            })
            ->values()
            ->toArray();

        $this->merge([
            'sizes' => $sizes,
        ]);
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'La catégorie est requise',
            'name.en.required' => 'Le nom du produit en anglais est requis',
            'name.ar.required' => 'Le nom du produit en arabe est requis',
            'price.required' => 'Le prix de vente est requis',
            'price.gt' => 'Le prix de vente doit être supérieur au prix d’achat',
            'purchase_price.required' => 'Le prix d’achat est requis',
            'sku.required' => 'Le code SKU est requis',
            'sku.unique' => 'Le code SKU existe déjà',
            'stock_quantity.required' => 'La quantité est requise',
            'gender.required' => 'Le genre ciblé est requis',
            'image.image' => 'Le fichier doit être une image',
        ];
    }
}

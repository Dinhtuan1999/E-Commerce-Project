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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (isset($this->id)) {
            return [
                'product_name' => 'required||max:255',
                'price' => 'required',
                // 'feature_image_path' => 'required',
                // 'image_path' => 'required',
                'tags' => 'required',
                'category_id' => 'required',
                'content' => 'required'
            ];
        } else {
            return [
                'product_name' => 'required||max:255',
                'price' => 'required',
                // 'feature_image_path' => 'required',
                // 'image_path' => 'required',
                'tags' => 'required',
                'category_id' => 'required',
                'content' => 'required'
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        if (isset($this->id)) {
            return [
                'product_name.required' => 'Tên sản phẩm không được để trống',
                'price.required' => 'Giá sản phẩm không được để trống',
                'feature_image_path.required' => 'Ảnh sản phẩm không được để trống',
                'image_path.required' => 'Ảnh chi tiết sản phẩm không được để trống',
                'tags.required' => 'Tag không được để trống',
                'category_id.required' => 'Danh mục sản phẩm không được để trống',
                'content.required' => 'Mô tả sản phẩm không được để trống',

            ];
        } else {
            return [
                'product_name.required' => 'Tên sản phẩm không được để trống',
                'price.required' => 'Giá sản phẩm không được để trống',
                'feature_image_path.required' => 'Ảnh sản phẩm không được để trống',
                'image_path.required' => 'Ảnh chi tiết sản phẩm không được để trống',
                'tags.required' => 'Tag không được để trống',
                'category_id.required' => 'Danh mục sản phẩm không được để trống',
                'content.required' => 'Mô tả sản phẩm không được để trống',

            ];
        }
    }
}

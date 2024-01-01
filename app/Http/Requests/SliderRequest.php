<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                'slider_name' => 'required|max:255',
                // 'feature_image_path' => 'required',
                // 'image_path' => 'required',
                'description' => 'required'
            ];
        } else {
            return [
                'slider_name' => 'required|max:255',
                // 'feature_image_path' => 'required',
                // 'image_path' => 'required',
                'description' => 'required'
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
                'slider_name.required' => 'Tên sản phẩm không được để trống',
                // 'feature_image_path.required' => 'Ảnh sản phẩm không được để trống',
                // 'image_path.required' => 'Ảnh chi tiết sản phẩm không được để trống',
                'description.required' => 'Mô tả sản phẩm không được để trống',

            ];
        } else {
            return [
                'slider_name.required' => 'Tên sản phẩm không được để trống',
                // 'feature_image_path.required' => 'Ảnh sản phẩm không được để trống',
                // 'image_path.required' => 'Ảnh chi tiết sản phẩm không được để trống',
                'description.required' => 'Mô tả sản phẩm không được để trống',

            ];
        }
    }
}

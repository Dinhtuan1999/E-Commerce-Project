<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
                'config_key' => 'required|max:255',
                'config_value' => 'required'
            ];
        } else {
            return [
                'config_key' => 'required|max:255',
                'config_value' => 'required'
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
                'config_key.required' => 'Tên slider không được để trống',
                'config_value.required' => 'Config value không được để trống',

            ];
        } else {
            return [
                'config_key.required' => 'Tên slider không được để trống',
                'config_value.required' => 'Config value không được để trống',

            ];
        }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'POST':
            {
                return [
                    'mobile' => ['required','max:11','min:11'],
                    'real_name' => ['required','max:20'],
                    'address' => ['required','max:100'],
                ];
            }
            case 'PUT':
            case 'PATCH':
            case 'DELETE':
            default: {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            'mobile.required'=>'手机号必须填写',
            'mobile.max' => '手机号长度为11个字符',
            'mobile.min' => '手机号长度为11个字符',
            'real_name.required'=>'真实姓名必须填写',
            'real_name.max' => '真实姓名长度为6个字符',
            'address.required' => '地址不能为空',
            'address.max' => '地址长度不能超过20个字符',
        ];
    }
}

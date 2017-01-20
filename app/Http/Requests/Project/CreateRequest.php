<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
        return [
            'prefix' => 'required',
            'name' => ['required', Rule::unique('projects')->where('prefix', request('prefix'))],
            'nick' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'prefix.required' => '專案前綴 欄位是必填的',
            'name.required' => '專案名稱 欄位是必填的',
            'name.unique' => '專案名稱 已經被使用...',
            'nick.required'  => '專案代號 欄位是必填的',
        ];
    }
}

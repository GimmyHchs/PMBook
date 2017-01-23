<?php

namespace App\Http\Requests\Project;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateRequest extends FormRequest
{
    /**
     * Determin if Validation failed.
     *
     * @var boolean
     */
    private $isFailed = false;


    /**
     * @var array
     */
    private $formatErrors;

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
     * [Override] Handle a failed validation attempt.
     *
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $this->isFailed = true;
        $this->formatErrors = $this->formatErrors($validator);
    }

    /**
     * Return the validation is failed or not
     *
     * @return boolean
     */
    public function isFailed()
    {
        return $this->isFailed;
    }

    /**
     * Get the proper failed validation response for the request.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function responseError()
    {
        return $this->response($this->formatErrors);
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

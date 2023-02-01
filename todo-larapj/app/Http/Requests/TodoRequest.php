<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'name' => 'required |max:20',
            'tag_id' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'タスク名を入力してください。',
            'name.max' =>'タスク名は２０文字以内で入力してください。',
            'tag_id.required' => 'タグ選択してください'
        ];
    }
}

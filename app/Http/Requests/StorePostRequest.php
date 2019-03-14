<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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


    public function withValidator($validator)
    {
        //do something before validation
//               dd('with validator');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|unique:posts|max:255|min:3',
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id'
        ];




        return $rules;
    }
}

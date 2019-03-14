<?php

namespace App\Http\Requests;

use App\Post;
use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

class updatePostRequest extends FormRequest
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
        $id = $this->segment(2);
        $rules = [
            'title' => 'required|max:255|min:3|unique:posts'. ',id,' . $id,
            'description' => 'required|min:10',
//            'user_id' => 'required|exists:posts'
        ];

        return $rules;
    }
}

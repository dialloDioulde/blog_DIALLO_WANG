<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommenttRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_name' => 'required',
            'post_title' => 'required',
            'post_content' => 'required',
            'post_type' => 'required',
            'post_status' => 'required',
            'post_category' => 'required',
            //
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "title" => "required|min:6|max:20",
            "content" => "required|min:6|max:100",
            "access_modifier" => "required",
            "user_id" => "user_id",
        ];
    }
}

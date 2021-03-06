<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
//        dd($this->request->all());
        return [
            "name" => "bail|required|string",
            "description" => "required|min:10|max:1500",
            "poster" => "sometimes|nullable|mimes:png,jpg,jpeg",
            "date" => "date",
            "price" => "sometimes|numeric",
            "categories" => "array",
            "categories.*.category_id" => "required|numeric|exists:categories,id"
        ];
    }


//    public function failedValidation(Validator $validator)
//    {
//        dd($validator->errors());
//    }
}

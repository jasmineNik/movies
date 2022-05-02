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
            "name" => "required|string",
            "description" => "required|min:10|max:1500",
            "poster" => "sometimes|mimes:png",
            "date" => "date",
            "price" => "sometimes|numeric"
        ];
    }


    public function failedValidation(Validator $validator)
    {
        dd($validator->errors());
    }
}

<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
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
        // return [
        //     "name" => "required|string",
        //     "description" => "required|min:10|max:1500",
        //     "poster" => "sometimes|mimes:png",
        //     "date" => "date",
        //     "price" => "sometimes|numeric",
        //     "languages" => "array",
        //     "languages.*.language_id" => "required|numeric|exists:languages,id",
        //     "categories" => "array",
        //     "categories.*.category_id" => "required|numeric|exists:categories,id"
        // ];
    }
}

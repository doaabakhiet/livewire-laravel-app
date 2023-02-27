<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>['required','string'],
            'slug'=>['required','string'],
            'brand'=>['required','string'],
            'quantity'=>['required'],
            'description'=>['required','string'],
            'small_description'=>['required','string'],
            'image' => 'nullable','mimes:jpeg,bmp,png',
            'category_id'=>['required','integer'],
            'original_price'=>['required','integer'],
            'selling_price'=>['required','integer'],
            'status'=>['nullable'],
            'meta_title'=>['required','string'],
            'meta_keywords'=>['required','string'],
            'meta_description'=>['required'],
        ];
    }
}

<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
           'comment' => 'required|min:3|max:250',
            'rating' => 'required|integer|between:1,5'
        ];
    }
}
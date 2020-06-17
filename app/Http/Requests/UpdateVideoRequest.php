<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:20',
            'description' => 'required|min:3|max:500',
        ];
    }
}
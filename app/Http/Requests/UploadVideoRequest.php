<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UploadVideoRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:20',
            'description' => 'required|min:3|max:500',
            'category' => 'required',
            'video' => 'required',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PodcastRequest extends FormRequest
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
        return [
            'title'=> 'required|unique:podcasts|max:191',
            'photo' => 'required',
            'mp3' => 'required'
        ];
    }
    public function messages(){
        return[
            'title.required'=> 'this input mustn\'t be empty',
            'photo.required'=> 'this input mustn\'t be empty',
            'mp3.required'=> 'this input mustn\'t be empty',
            'title.unique' => 'this podcast is already exists',
            'title.max' => 'this input must be less than 191 characters',
        ];
    }
}

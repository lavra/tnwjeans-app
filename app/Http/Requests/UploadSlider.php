<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadSlider extends FormRequest
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

        if ($this->method('POST')) {
            $rules['image'] = 'required|image|mimes:jpeg|dimensions:min_width=1920,min_height:1280';
            $rules['order'] = 'required|numeric|min:1|max:2';
        }


        if ($this->method('PUT')) {
            $rules['image'] = 'image|mimes:jpeg|dimensions:min_width=1920,min_height:1280';
            $rules['order'] = 'required|numeric|min:1|max:2';
        }

        return $rules;
    }
}

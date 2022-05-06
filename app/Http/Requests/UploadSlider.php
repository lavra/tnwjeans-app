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
        $id = $this->id ?? '';

        if ($this->page === 1) {
            $validate_img = 'required|image|mimes:jpeg|dimensions:min_width=1920,min_height:1280';
        } else {
            $validate_img = 'required|image|mimes:jpeg|dimensions:min_width=700,min_height:1050';
        }


        if ($this->method('POST')) {
            $rules['image'] = $validate_img;
            $rules['order'] = 'required|numeric|min:1';
        }

        if ($this->method('PUT')) {
            $rules['order'] = 'required|numeric|min:1';
        }

        return $rules;
    }



}

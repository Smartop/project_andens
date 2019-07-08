<?php

namespace Andens\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoStoreRequest extends FormRequest
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
            'title' => 'required|max:60',
            'desc' => 'nullable',
            'category' => 'required|max:20',
            'camera' => 'nullable',
            'image' => 'required|mimes:jpeg,bmp,png'
        ];
    }
}

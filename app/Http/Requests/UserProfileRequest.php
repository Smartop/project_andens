<?php

namespace Andens\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserProfileRequest extends FormRequest
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
        $id = Auth::id();

        return [
            'nickname' => 'max:25|unique:users,nickname,'.$id,
            'real_name' => 'nullable|max:60',
            'bio' => 'nullable',
            'country' => 'required',
            'gender' => 'required',
            'email' => 'email|unique:users,email,'.$id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}

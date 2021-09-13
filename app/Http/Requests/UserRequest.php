<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if($this->route()->id){
            return [
                'name' => 'required|min:2',
                'email' => 'required|unique:users,email'.$id,
                'roll_id' => 'required',
            ];
        }

        return [
            'name' => 'required|min:2',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'roll_id' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            //'name'          => 'required|string|max:50|min:3',
            'username'         => 'required|unique:users,username',
            //'phone'         => 'required|unique:users,phone|max:13|min:9|regex:/^[5][0-9]{4,}/',
            //'image'         => 'required',
            'area_id'    => 'required',
            'email'         => 'required|string|email|unique:users,email',
            'password'      => 'required|string|min:6|max:15',
            //'nationality_id'=> 'required|between:10,11|regex:/(^[0-9 ]+$)+/',
            //'birth_year'    => 'required',
        ];
    }


    public function persist()
    {
        $data = User::create($this->request->all());
        return $data;
    }
}

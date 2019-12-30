<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Validation\Rule;

class EditRequest extends FormRequest
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
            'username'         => ['required', Rule::unique('users')->ignore($this->id, 'id')],
            //'phone'         => ['required','min:9','max:13','regex:/^[5][0-9]{4,}/', Rule::unique('users')->ignore($this->id, 'id')],
            //'image'         => 'required',
            'email'         => ['required','email', Rule::unique('users')->ignore($this->id, 'id')],
            //'password'      => 'required|string|min:6',
            'password'      => 'sometimes|nullable|min:6|max:15',
            //'nationality_id'=> 'required|between:10,11|regex:/(^[0-9 ]+$)+/',
            'area_id'    => 'required',
            //'birth_year'    => 'required',
        ];
    }

    public function persist($id)
    {
        $this->id = $id;
        if ($this->password && $this->password !='' && trim($this->password) != '' && $this->password != null) {
        }
        else
        {
            $this->offsetunset('password');
        }


        User::find($id)->Update($this->request->all());
    }
}

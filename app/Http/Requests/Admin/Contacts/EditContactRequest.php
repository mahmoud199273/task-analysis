<?php

namespace App\Http\Requests\Admin\Contacts;

use App\Http\Requests\Admin\BaseRequest;
use App\ContactUs;
use Illuminate\Validation\Rule;


class EditContactRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   public function rules()
    {
        return [
            'admin_reply'                      => 'required|string',
            
        ];
    }

    public function persist($id)
    {
        //dd($this->request->all());
        ContactUs::find($id)->Update($this->request->all());
        //Setting::where('id',$id)->Update($this->request->all());
    }


}
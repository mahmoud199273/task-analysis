<?php

namespace App\Http\Requests\Admin\AboutApp;

use App\Http\Requests\Admin\BaseRequest;
use App\AboutApp;
use Illuminate\Validation\Rule;


class EditAboutAppRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   public function rules()
    {
        return [
            'body'                         => 'required',
            'address'                      => 'required',
            'fb_link'                      => 'required|max:191',
            'twitter_link'                 => 'required|max:191',
            'google_link'                  => 'required|max:191',
            // 'insta_link'                   => 'required',
            // 'snap_link'                    => 'required',
            'privacy_title'                => 'required|max:191',
            'privacy_policy'               => 'required',
            'consultant_privacy_title'     => 'required|max:191',
            'phone'                        => 'required',
            'google_play_url'              => 'required|max:191',
            'app_store_url'                => 'required|max:191',
            

        ];
    }

    public function persist($id)
    {
        AboutApp::find($id)->Update($this->request->all());
    }


}
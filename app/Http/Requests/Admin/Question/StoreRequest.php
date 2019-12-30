<?php

namespace App\Http\Requests\Admin\Question;

use Illuminate\Foundation\Http\FormRequest;
use App\Questions;
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
            'title_ar'              => 'required',
            'title_en'              => 'required',
            'type'                  => 'required',
            'settings'              => 'required|integer',
            //'note'                  => 'required',
            'page_num'              => 'required',
            'survey_id'             => 'required',

        ];
    }


    public function persist()
    {
        $data = Questions::create($this->request->all());
        return $data;
    }
}

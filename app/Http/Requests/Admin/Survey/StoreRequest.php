<?php

namespace App\Http\Requests\Admin\Survey;

use Illuminate\Foundation\Http\FormRequest;
use App\Survey;
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
            'no_filled'             => 'required|integer',
            'no_hours'                 => 'required|integer',
            'num_pages'             => 'required',
            'record'                => 'required',
            'status'                => 'required',
            'area_id'                => 'required',
        ];
    }


    public function persist()
    {
        $data = Survey::create($this->request->all());
        return $data;
    }
}

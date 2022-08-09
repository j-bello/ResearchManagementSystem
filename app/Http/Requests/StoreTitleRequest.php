<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreTitleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('title_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>[
                'required','string'
            ],
            'description'=>[
                'required','string'
            ],
            'tags'=>[
                'required','string'
            ],
            'approvedBy'=>[
                'required','string'
            ],
            'year'=>[
                'required','string'
            ],
        ];
    }
}

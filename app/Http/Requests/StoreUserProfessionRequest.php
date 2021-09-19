<?php

namespace App\Http\Requests;

use App\Models\UserProfession;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserProfessionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_profession_create');
    }

    public function rules()
    {
        return [
            'name_en' => [
                'string',
                'required',
            ],
            'name_it' => [
                'string',
                'nullable',
            ],
            'name_es' => [
                'string',
                'nullable',
            ],
            'name_ja' => [
                'string',
                'nullable',
            ],
        ];
    }
}

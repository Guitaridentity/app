<?php

namespace App\Http\Requests;

use App\Models\Testfunction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTestfunctionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('testfunction_create');
    }

    public function rules()
    {
        return [
            'text' => [
                'string',
                'nullable',
            ],
            'number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

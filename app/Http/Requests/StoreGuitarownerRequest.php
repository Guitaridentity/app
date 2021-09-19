<?php

namespace App\Http\Requests;

use App\Models\Guitarowner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarownerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitarowner_create');
    }

    public function rules()
    {
        return [
            'hix' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

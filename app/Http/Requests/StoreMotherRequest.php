<?php

namespace App\Http\Requests;

use App\Models\Mother;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMotherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mother_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'strings_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'image_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}

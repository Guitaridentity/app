<?php

namespace App\Http\Requests;

use App\Models\GuitarBrandModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarBrandModelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_brand_model_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}

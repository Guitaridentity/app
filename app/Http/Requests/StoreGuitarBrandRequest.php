<?php

namespace App\Http\Requests;

use App\Models\GuitarBrand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarBrandRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_brand_create');
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

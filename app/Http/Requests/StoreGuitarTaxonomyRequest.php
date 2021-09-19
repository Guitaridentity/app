<?php

namespace App\Http\Requests;

use App\Models\GuitarTaxonomy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarTaxonomyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_taxonomy_create');
    }

    public function rules()
    {
        return [
            'value' => [
                'string',
                'nullable',
            ],
        ];
    }
}

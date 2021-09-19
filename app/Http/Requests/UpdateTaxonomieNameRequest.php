<?php

namespace App\Http\Requests;

use App\Models\TaxonomieName;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaxonomieNameRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('taxonomie_name_edit');
    }

    public function rules()
    {
        return [
            'name_en' => [
                'string',
                'nullable',
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

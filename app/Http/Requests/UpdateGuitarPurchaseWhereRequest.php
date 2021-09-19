<?php

namespace App\Http\Requests;

use App\Models\GuitarPurchaseWhere;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGuitarPurchaseWhereRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_purchase_where_edit');
    }

    public function rules()
    {
        return [
            'town' => [
                'string',
                'nullable',
            ],
            'province' => [
                'string',
                'nullable',
            ],
            'state' => [
                'string',
                'nullable',
            ],
            'country' => [
                'string',
                'nullable',
            ],
            'zip' => [
                'string',
                'nullable',
            ],
            'latitude' => [
                'numeric',
            ],
            'longitude' => [
                'numeric',
            ],
        ];
    }
}

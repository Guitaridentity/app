<?php

namespace App\Http\Requests;

use App\Models\Guitarchange;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarchangeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitarchange_create');
    }

    public function rules()
    {
        return [
            'date_change' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'done_by' => [
                'string',
                'nullable',
            ],
        ];
    }
}

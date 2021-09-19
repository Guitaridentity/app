<?php

namespace App\Http\Requests;

use App\Models\Guitar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_create');
    }

    public function rules()
    {
        return [
            'serial' => [
                'string',
                'nullable',
            ],
            'strings_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'certified' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cert_code' => [
                'string',
                'nullable',
            ],
            'to_sell' => [
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

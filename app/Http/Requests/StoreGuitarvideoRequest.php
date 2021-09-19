<?php

namespace App\Http\Requests;

use App\Models\Guitarvideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarvideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitarvideo_create');
    }

    public function rules()
    {
        return [
            'url' => [
                'string',
                'nullable',
            ],
        ];
    }
}

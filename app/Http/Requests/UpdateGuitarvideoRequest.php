<?php

namespace App\Http\Requests;

use App\Models\Guitarvideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGuitarvideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitarvideo_edit');
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

<?php

namespace App\Http\Requests;

use App\Models\GuitarPicture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarPictureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_picture_create');
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

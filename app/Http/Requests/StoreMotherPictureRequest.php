<?php

namespace App\Http\Requests;

use App\Models\MotherPicture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMotherPictureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mother_picture_create');
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

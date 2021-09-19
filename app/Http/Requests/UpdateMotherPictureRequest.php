<?php

namespace App\Http\Requests;

use App\Models\MotherPicture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMotherPictureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mother_picture_edit');
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

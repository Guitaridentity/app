<?php

namespace App\Http\Requests;

use App\Models\UserPicture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserPictureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_picture_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'url' => [
                'string',
                'nullable',
            ],
        ];
    }
}

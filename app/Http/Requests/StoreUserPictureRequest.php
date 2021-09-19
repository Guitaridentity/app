<?php

namespace App\Http\Requests;

use App\Models\UserPicture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserPictureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_picture_create');
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

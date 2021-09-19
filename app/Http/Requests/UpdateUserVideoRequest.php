<?php

namespace App\Http\Requests;

use App\Models\UserVideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserVideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_video_edit');
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

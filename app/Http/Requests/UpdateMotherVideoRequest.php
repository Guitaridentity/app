<?php

namespace App\Http\Requests;

use App\Models\MotherVideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMotherVideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mother_video_edit');
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

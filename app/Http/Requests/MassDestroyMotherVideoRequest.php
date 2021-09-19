<?php

namespace App\Http\Requests;

use App\Models\MotherVideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMotherVideoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mother_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mother_videos,id',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\MotherLike;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMotherLikeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mother_like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mother_likes,id',
        ];
    }
}

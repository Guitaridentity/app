<?php

namespace App\Http\Requests;

use App\Models\GuitarLike;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarLikeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitar_like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitar_likes,id',
        ];
    }
}

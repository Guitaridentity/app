<?php

namespace App\Http\Requests;

use App\Models\GuitarComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarCommentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitar_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitar_comments,id',
        ];
    }
}

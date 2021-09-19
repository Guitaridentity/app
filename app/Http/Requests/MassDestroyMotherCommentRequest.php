<?php

namespace App\Http\Requests;

use App\Models\MotherComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMotherCommentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mother_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mother_comments,id',
        ];
    }
}

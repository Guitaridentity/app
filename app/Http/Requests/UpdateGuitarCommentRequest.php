<?php

namespace App\Http\Requests;

use App\Models\GuitarComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGuitarCommentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_comment_edit');
    }

    public function rules()
    {
        return [
            'signaled' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'disabled' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'likes' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

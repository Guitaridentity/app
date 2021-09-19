<?php

namespace App\Http\Requests;

use App\Models\GuitarComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarCommentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_comment_create');
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

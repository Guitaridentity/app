<?php

namespace App\Http\Requests;

use App\Models\UserDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_detail_create');
    }

    public function rules()
    {
        return [
            'www' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'youtube' => [
                'string',
                'nullable',
            ],
            'tiktok' => [
                'string',
                'nullable',
            ],
            'soundcloud' => [
                'string',
                'nullable',
            ],
            'drooble' => [
                'string',
                'nullable',
            ],
            'linkedin' => [
                'string',
                'nullable',
            ],
        ];
    }
}

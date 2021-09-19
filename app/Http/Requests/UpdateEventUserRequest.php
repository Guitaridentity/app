<?php

namespace App\Http\Requests;

use App\Models\EventUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_user_edit');
    }

    public function rules()
    {
        return [
            'user' => [
                'string',
                'nullable',
            ],
        ];
    }
}

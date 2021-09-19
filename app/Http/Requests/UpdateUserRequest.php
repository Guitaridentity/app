<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'mobile_prefix' => [
                'string',
                'nullable',
            ],
            'mobile_number' => [
                'string',
                'nullable',
            ],
            'language' => [
                'string',
                'nullable',
            ],
            'date_birth' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'avatar' => [
                'string',
                'nullable',
            ],
            'disabled' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

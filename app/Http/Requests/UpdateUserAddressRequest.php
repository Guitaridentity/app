<?php

namespace App\Http\Requests;

use App\Models\UserAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_address_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'town' => [
                'string',
                'nullable',
            ],
            'province' => [
                'string',
                'nullable',
            ],
            'state' => [
                'string',
                'nullable',
            ],
            'country' => [
                'string',
                'nullable',
            ],
            'zip' => [
                'string',
                'nullable',
            ],
            'latitude' => [
                'numeric',
            ],
            'longitude' => [
                'numeric',
            ],
        ];
    }
}

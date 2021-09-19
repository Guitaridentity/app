<?php

namespace App\Http\Requests;

use App\Models\Plan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('plan_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'certification' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'picture' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'video' => [
                'string',
                'nullable',
            ],
            'events' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'courses' => [
                'string',
                'nullable',
            ],
            'month' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'array',
            ],
        ];
    }
}

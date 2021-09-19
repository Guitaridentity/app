<?php

namespace App\Http\Requests;

use App\Models\MotherDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMotherDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mother_description_edit');
    }

    public function rules()
    {
        return [
            'approved' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

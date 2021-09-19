<?php

namespace App\Http\Requests;

use App\Models\Guitarowner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarownerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitarowner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitarowners,id',
        ];
    }
}

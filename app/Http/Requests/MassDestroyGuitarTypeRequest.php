<?php

namespace App\Http\Requests;

use App\Models\GuitarType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitar_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitar_types,id',
        ];
    }
}

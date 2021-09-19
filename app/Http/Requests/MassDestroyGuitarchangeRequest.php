<?php

namespace App\Http\Requests;

use App\Models\Guitarchange;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarchangeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitarchange_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitarchanges,id',
        ];
    }
}

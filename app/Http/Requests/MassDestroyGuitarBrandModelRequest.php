<?php

namespace App\Http\Requests;

use App\Models\GuitarBrandModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarBrandModelRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitar_brand_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitar_brand_models,id',
        ];
    }
}

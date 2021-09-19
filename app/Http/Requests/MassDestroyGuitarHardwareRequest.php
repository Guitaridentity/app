<?php

namespace App\Http\Requests;

use App\Models\GuitarHardware;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarHardwareRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitar_hardware_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitar_hardware,id',
        ];
    }
}

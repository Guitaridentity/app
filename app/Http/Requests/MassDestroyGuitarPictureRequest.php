<?php

namespace App\Http\Requests;

use App\Models\GuitarPicture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarPictureRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitar_picture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitar_pictures,id',
        ];
    }
}

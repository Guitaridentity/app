<?php

namespace App\Http\Requests;

use App\Models\GuitarPurchased;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarPurchasedRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitar_purchased_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitar_purchaseds,id',
        ];
    }
}

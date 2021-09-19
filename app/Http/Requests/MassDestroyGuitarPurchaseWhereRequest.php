<?php

namespace App\Http\Requests;

use App\Models\GuitarPurchaseWhere;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGuitarPurchaseWhereRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guitar_purchase_where_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:guitar_purchase_wheres,id',
        ];
    }
}

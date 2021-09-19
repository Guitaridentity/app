<?php

namespace App\Http\Requests;

use App\Models\GuitarPurchased;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGuitarPurchasedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_purchased_edit');
    }

    public function rules()
    {
        return [
            'purchased_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'purchase_price_currency' => [
                'string',
                'nullable',
            ],
            'purchased_who' => [
                'string',
                'nullable',
            ],
        ];
    }
}

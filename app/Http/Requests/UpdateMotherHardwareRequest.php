<?php

namespace App\Http\Requests;

use App\Models\MotherHardware;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMotherHardwareRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mother_hardware_edit');
    }

    public function rules()
    {
        return [
            'guitar_production_year' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pickup_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pickup_configuration' => [
                'string',
                'nullable',
            ],
            'is_left_handed' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

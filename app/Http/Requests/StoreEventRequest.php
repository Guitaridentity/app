<?php

namespace App\Http\Requests;

use App\Models\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'start' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'hours_endurance' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'link_live' => [
                'string',
                'nullable',
            ],
            'link_vod' => [
                'string',
                'nullable',
            ],
            'percent_to_author' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cover_img' => [
                'string',
                'nullable',
            ],
            'cover_video' => [
                'string',
                'nullable',
            ],
        ];
    }
}

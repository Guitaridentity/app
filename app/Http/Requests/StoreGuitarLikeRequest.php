<?php

namespace App\Http\Requests;

use App\Models\GuitarLike;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGuitarLikeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_like_create');
    }

    public function rules()
    {
        return [];
    }
}

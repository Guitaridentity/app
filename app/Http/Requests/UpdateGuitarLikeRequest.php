<?php

namespace App\Http\Requests;

use App\Models\GuitarLike;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGuitarLikeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guitar_like_edit');
    }

    public function rules()
    {
        return [];
    }
}

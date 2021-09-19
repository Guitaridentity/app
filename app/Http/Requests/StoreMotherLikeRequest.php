<?php

namespace App\Http\Requests;

use App\Models\MotherLike;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMotherLikeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mother_like_create');
    }

    public function rules()
    {
        return [];
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMotherLikeRequest;
use App\Http\Requests\UpdateMotherLikeRequest;
use App\Http\Resources\Admin\MotherLikeResource;
use App\Models\MotherLike;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherLikesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_like_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherLikeResource(MotherLike::with(['mother', 'user'])->get());
    }

    public function store(StoreMotherLikeRequest $request)
    {
        $motherLike = MotherLike::create($request->all());

        return (new MotherLikeResource($motherLike))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MotherLike $motherLike)
    {
        abort_if(Gate::denies('mother_like_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherLikeResource($motherLike->load(['mother', 'user']));
    }

    public function update(UpdateMotherLikeRequest $request, MotherLike $motherLike)
    {
        $motherLike->update($request->all());

        return (new MotherLikeResource($motherLike))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MotherLike $motherLike)
    {
        abort_if(Gate::denies('mother_like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherLike->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

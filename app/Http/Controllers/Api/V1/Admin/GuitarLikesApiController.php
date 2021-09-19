<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarLikeRequest;
use App\Http\Requests\UpdateGuitarLikeRequest;
use App\Http\Resources\Admin\GuitarLikeResource;
use App\Models\GuitarLike;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarLikesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_like_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarLikeResource(GuitarLike::with(['guitar', 'user'])->get());
    }

    public function store(StoreGuitarLikeRequest $request)
    {
        $guitarLike = GuitarLike::create($request->all());

        return (new GuitarLikeResource($guitarLike))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuitarLike $guitarLike)
    {
        abort_if(Gate::denies('guitar_like_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarLikeResource($guitarLike->load(['guitar', 'user']));
    }

    public function update(UpdateGuitarLikeRequest $request, GuitarLike $guitarLike)
    {
        $guitarLike->update($request->all());

        return (new GuitarLikeResource($guitarLike))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuitarLike $guitarLike)
    {
        abort_if(Gate::denies('guitar_like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarLike->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

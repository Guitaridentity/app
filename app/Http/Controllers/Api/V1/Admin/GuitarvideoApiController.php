<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarvideoRequest;
use App\Http\Requests\UpdateGuitarvideoRequest;
use App\Http\Resources\Admin\GuitarvideoResource;
use App\Models\Guitarvideo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarvideoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitarvideo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarvideoResource(Guitarvideo::with(['guitar'])->get());
    }

    public function store(StoreGuitarvideoRequest $request)
    {
        $guitarvideo = Guitarvideo::create($request->all());

        return (new GuitarvideoResource($guitarvideo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Guitarvideo $guitarvideo)
    {
        abort_if(Gate::denies('guitarvideo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarvideoResource($guitarvideo->load(['guitar']));
    }

    public function update(UpdateGuitarvideoRequest $request, Guitarvideo $guitarvideo)
    {
        $guitarvideo->update($request->all());

        return (new GuitarvideoResource($guitarvideo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Guitarvideo $guitarvideo)
    {
        abort_if(Gate::denies('guitarvideo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarvideo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

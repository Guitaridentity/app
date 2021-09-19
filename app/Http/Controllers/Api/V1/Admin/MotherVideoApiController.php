<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMotherVideoRequest;
use App\Http\Requests\UpdateMotherVideoRequest;
use App\Http\Resources\Admin\MotherVideoResource;
use App\Models\MotherVideo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherVideoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherVideoResource(MotherVideo::with(['mother'])->get());
    }

    public function store(StoreMotherVideoRequest $request)
    {
        $motherVideo = MotherVideo::create($request->all());

        return (new MotherVideoResource($motherVideo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MotherVideo $motherVideo)
    {
        abort_if(Gate::denies('mother_video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherVideoResource($motherVideo->load(['mother']));
    }

    public function update(UpdateMotherVideoRequest $request, MotherVideo $motherVideo)
    {
        $motherVideo->update($request->all());

        return (new MotherVideoResource($motherVideo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MotherVideo $motherVideo)
    {
        abort_if(Gate::denies('mother_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherVideo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

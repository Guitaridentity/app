<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserVideoRequest;
use App\Http\Requests\UpdateUserVideoRequest;
use App\Http\Resources\Admin\UserVideoResource;
use App\Models\UserVideo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserVideoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserVideoResource(UserVideo::with(['user'])->get());
    }

    public function store(StoreUserVideoRequest $request)
    {
        $userVideo = UserVideo::create($request->all());

        return (new UserVideoResource($userVideo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UserVideo $userVideo)
    {
        abort_if(Gate::denies('user_video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserVideoResource($userVideo->load(['user']));
    }

    public function update(UpdateUserVideoRequest $request, UserVideo $userVideo)
    {
        $userVideo->update($request->all());

        return (new UserVideoResource($userVideo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UserVideo $userVideo)
    {
        abort_if(Gate::denies('user_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userVideo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

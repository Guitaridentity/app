<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPictureRequest;
use App\Http\Requests\UpdateUserPictureRequest;
use App\Http\Resources\Admin\UserPictureResource;
use App\Models\UserPicture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserPicturesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_picture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserPictureResource(UserPicture::with(['user'])->get());
    }

    public function store(StoreUserPictureRequest $request)
    {
        $userPicture = UserPicture::create($request->all());

        return (new UserPictureResource($userPicture))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UserPicture $userPicture)
    {
        abort_if(Gate::denies('user_picture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserPictureResource($userPicture->load(['user']));
    }

    public function update(UpdateUserPictureRequest $request, UserPicture $userPicture)
    {
        $userPicture->update($request->all());

        return (new UserPictureResource($userPicture))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UserPicture $userPicture)
    {
        abort_if(Gate::denies('user_picture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userPicture->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

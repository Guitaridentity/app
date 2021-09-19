<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserProfessionRequest;
use App\Http\Requests\UpdateUserProfessionRequest;
use App\Http\Resources\Admin\UserProfessionResource;
use App\Models\UserProfession;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserProfessionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_profession_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserProfessionResource(UserProfession::all());
    }

    public function store(StoreUserProfessionRequest $request)
    {
        $userProfession = UserProfession::create($request->all());

        return (new UserProfessionResource($userProfession))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UserProfession $userProfession)
    {
        abort_if(Gate::denies('user_profession_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserProfessionResource($userProfession);
    }

    public function update(UpdateUserProfessionRequest $request, UserProfession $userProfession)
    {
        $userProfession->update($request->all());

        return (new UserProfessionResource($userProfession))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UserProfession $userProfession)
    {
        abort_if(Gate::denies('user_profession_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userProfession->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

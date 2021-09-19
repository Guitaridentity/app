<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserPictureRequest;
use App\Http\Requests\StoreUserPictureRequest;
use App\Http\Requests\UpdateUserPictureRequest;
use App\Models\User;
use App\Models\UserPicture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserPicturesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_picture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userPictures = UserPicture::with(['user'])->get();

        return view('admin.userPictures.index', compact('userPictures'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_picture_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userPictures.create', compact('users'));
    }

    public function store(StoreUserPictureRequest $request)
    {
        $userPicture = UserPicture::create($request->all());

        return redirect()->route('admin.user-pictures.index');
    }

    public function edit(UserPicture $userPicture)
    {
        abort_if(Gate::denies('user_picture_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userPicture->load('user');

        return view('admin.userPictures.edit', compact('users', 'userPicture'));
    }

    public function update(UpdateUserPictureRequest $request, UserPicture $userPicture)
    {
        $userPicture->update($request->all());

        return redirect()->route('admin.user-pictures.index');
    }

    public function show(UserPicture $userPicture)
    {
        abort_if(Gate::denies('user_picture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userPicture->load('user');

        return view('admin.userPictures.show', compact('userPicture'));
    }

    public function destroy(UserPicture $userPicture)
    {
        abort_if(Gate::denies('user_picture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userPicture->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserPictureRequest $request)
    {
        UserPicture::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

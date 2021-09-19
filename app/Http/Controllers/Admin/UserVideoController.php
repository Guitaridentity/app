<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserVideoRequest;
use App\Http\Requests\StoreUserVideoRequest;
use App\Http\Requests\UpdateUserVideoRequest;
use App\Models\User;
use App\Models\UserVideo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserVideoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userVideos = UserVideo::with(['user'])->get();

        return view('admin.userVideos.index', compact('userVideos'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_video_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userVideos.create', compact('users'));
    }

    public function store(StoreUserVideoRequest $request)
    {
        $userVideo = UserVideo::create($request->all());

        return redirect()->route('admin.user-videos.index');
    }

    public function edit(UserVideo $userVideo)
    {
        abort_if(Gate::denies('user_video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userVideo->load('user');

        return view('admin.userVideos.edit', compact('users', 'userVideo'));
    }

    public function update(UpdateUserVideoRequest $request, UserVideo $userVideo)
    {
        $userVideo->update($request->all());

        return redirect()->route('admin.user-videos.index');
    }

    public function show(UserVideo $userVideo)
    {
        abort_if(Gate::denies('user_video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userVideo->load('user');

        return view('admin.userVideos.show', compact('userVideo'));
    }

    public function destroy(UserVideo $userVideo)
    {
        abort_if(Gate::denies('user_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userVideo->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserVideoRequest $request)
    {
        UserVideo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

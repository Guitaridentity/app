<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotherVideoRequest;
use App\Http\Requests\StoreMotherVideoRequest;
use App\Http\Requests\UpdateMotherVideoRequest;
use App\Models\Mother;
use App\Models\MotherVideo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherVideoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherVideos = MotherVideo::with(['mother'])->get();

        return view('admin.motherVideos.index', compact('motherVideos'));
    }

    public function create()
    {
        abort_if(Gate::denies('mother_video_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.motherVideos.create', compact('mothers'));
    }

    public function store(StoreMotherVideoRequest $request)
    {
        $motherVideo = MotherVideo::create($request->all());

        return redirect()->route('admin.mother-videos.index');
    }

    public function edit(MotherVideo $motherVideo)
    {
        abort_if(Gate::denies('mother_video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $motherVideo->load('mother');

        return view('admin.motherVideos.edit', compact('mothers', 'motherVideo'));
    }

    public function update(UpdateMotherVideoRequest $request, MotherVideo $motherVideo)
    {
        $motherVideo->update($request->all());

        return redirect()->route('admin.mother-videos.index');
    }

    public function show(MotherVideo $motherVideo)
    {
        abort_if(Gate::denies('mother_video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherVideo->load('mother');

        return view('admin.motherVideos.show', compact('motherVideo'));
    }

    public function destroy(MotherVideo $motherVideo)
    {
        abort_if(Gate::denies('mother_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherVideo->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotherVideoRequest $request)
    {
        MotherVideo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotherLikeRequest;
use App\Http\Requests\StoreMotherLikeRequest;
use App\Http\Requests\UpdateMotherLikeRequest;
use App\Models\Mother;
use App\Models\MotherLike;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherLikesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_like_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherLikes = MotherLike::with(['mother', 'user'])->get();

        return view('admin.motherLikes.index', compact('motherLikes'));
    }

    public function create()
    {
        abort_if(Gate::denies('mother_like_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.motherLikes.create', compact('mothers', 'users'));
    }

    public function store(StoreMotherLikeRequest $request)
    {
        $motherLike = MotherLike::create($request->all());

        return redirect()->route('admin.mother-likes.index');
    }

    public function edit(MotherLike $motherLike)
    {
        abort_if(Gate::denies('mother_like_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $motherLike->load('mother', 'user');

        return view('admin.motherLikes.edit', compact('mothers', 'users', 'motherLike'));
    }

    public function update(UpdateMotherLikeRequest $request, MotherLike $motherLike)
    {
        $motherLike->update($request->all());

        return redirect()->route('admin.mother-likes.index');
    }

    public function show(MotherLike $motherLike)
    {
        abort_if(Gate::denies('mother_like_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherLike->load('mother', 'user');

        return view('admin.motherLikes.show', compact('motherLike'));
    }

    public function destroy(MotherLike $motherLike)
    {
        abort_if(Gate::denies('mother_like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherLike->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotherLikeRequest $request)
    {
        MotherLike::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarLikeRequest;
use App\Http\Requests\StoreGuitarLikeRequest;
use App\Http\Requests\UpdateGuitarLikeRequest;
use App\Models\Guitar;
use App\Models\GuitarLike;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarLikesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_like_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarLikes = GuitarLike::with(['guitar', 'user'])->get();

        return view('admin.guitarLikes.index', compact('guitarLikes'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_like_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarLikes.create', compact('guitars', 'users'));
    }

    public function store(StoreGuitarLikeRequest $request)
    {
        $guitarLike = GuitarLike::create($request->all());

        return redirect()->route('admin.guitar-likes.index');
    }

    public function edit(GuitarLike $guitarLike)
    {
        abort_if(Gate::denies('guitar_like_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarLike->load('guitar', 'user');

        return view('admin.guitarLikes.edit', compact('guitars', 'users', 'guitarLike'));
    }

    public function update(UpdateGuitarLikeRequest $request, GuitarLike $guitarLike)
    {
        $guitarLike->update($request->all());

        return redirect()->route('admin.guitar-likes.index');
    }

    public function show(GuitarLike $guitarLike)
    {
        abort_if(Gate::denies('guitar_like_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarLike->load('guitar', 'user');

        return view('admin.guitarLikes.show', compact('guitarLike'));
    }

    public function destroy(GuitarLike $guitarLike)
    {
        abort_if(Gate::denies('guitar_like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarLike->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarLikeRequest $request)
    {
        GuitarLike::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

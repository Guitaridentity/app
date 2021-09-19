<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarCommentRequest;
use App\Http\Requests\StoreGuitarCommentRequest;
use App\Http\Requests\UpdateGuitarCommentRequest;
use App\Models\Guitar;
use App\Models\GuitarComment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarCommentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarComments = GuitarComment::with(['guitar', 'user'])->get();

        return view('admin.guitarComments.index', compact('guitarComments'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarComments.create', compact('guitars', 'users'));
    }

    public function store(StoreGuitarCommentRequest $request)
    {
        $guitarComment = GuitarComment::create($request->all());

        return redirect()->route('admin.guitar-comments.index');
    }

    public function edit(GuitarComment $guitarComment)
    {
        abort_if(Gate::denies('guitar_comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarComment->load('guitar', 'user');

        return view('admin.guitarComments.edit', compact('guitars', 'users', 'guitarComment'));
    }

    public function update(UpdateGuitarCommentRequest $request, GuitarComment $guitarComment)
    {
        $guitarComment->update($request->all());

        return redirect()->route('admin.guitar-comments.index');
    }

    public function show(GuitarComment $guitarComment)
    {
        abort_if(Gate::denies('guitar_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarComment->load('guitar', 'user');

        return view('admin.guitarComments.show', compact('guitarComment'));
    }

    public function destroy(GuitarComment $guitarComment)
    {
        abort_if(Gate::denies('guitar_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarComment->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarCommentRequest $request)
    {
        GuitarComment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

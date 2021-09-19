<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotherCommentRequest;
use App\Http\Requests\StoreMotherCommentRequest;
use App\Http\Requests\UpdateMotherCommentRequest;
use App\Models\Mother;
use App\Models\MotherComment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherCommentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherComments = MotherComment::with(['mother'])->get();

        return view('admin.motherComments.index', compact('motherComments'));
    }

    public function create()
    {
        abort_if(Gate::denies('mother_comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.motherComments.create', compact('mothers'));
    }

    public function store(StoreMotherCommentRequest $request)
    {
        $motherComment = MotherComment::create($request->all());

        return redirect()->route('admin.mother-comments.index');
    }

    public function edit(MotherComment $motherComment)
    {
        abort_if(Gate::denies('mother_comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $motherComment->load('mother');

        return view('admin.motherComments.edit', compact('mothers', 'motherComment'));
    }

    public function update(UpdateMotherCommentRequest $request, MotherComment $motherComment)
    {
        $motherComment->update($request->all());

        return redirect()->route('admin.mother-comments.index');
    }

    public function show(MotherComment $motherComment)
    {
        abort_if(Gate::denies('mother_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherComment->load('mother');

        return view('admin.motherComments.show', compact('motherComment'));
    }

    public function destroy(MotherComment $motherComment)
    {
        abort_if(Gate::denies('mother_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherComment->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotherCommentRequest $request)
    {
        MotherComment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

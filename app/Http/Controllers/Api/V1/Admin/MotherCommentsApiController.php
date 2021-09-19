<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMotherCommentRequest;
use App\Http\Requests\UpdateMotherCommentRequest;
use App\Http\Resources\Admin\MotherCommentResource;
use App\Models\MotherComment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherCommentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherCommentResource(MotherComment::with(['mother'])->get());
    }

    public function store(StoreMotherCommentRequest $request)
    {
        $motherComment = MotherComment::create($request->all());

        return (new MotherCommentResource($motherComment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MotherComment $motherComment)
    {
        abort_if(Gate::denies('mother_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherCommentResource($motherComment->load(['mother']));
    }

    public function update(UpdateMotherCommentRequest $request, MotherComment $motherComment)
    {
        $motherComment->update($request->all());

        return (new MotherCommentResource($motherComment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MotherComment $motherComment)
    {
        abort_if(Gate::denies('mother_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherComment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

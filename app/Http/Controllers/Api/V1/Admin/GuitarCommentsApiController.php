<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarCommentRequest;
use App\Http\Requests\UpdateGuitarCommentRequest;
use App\Http\Resources\Admin\GuitarCommentResource;
use App\Models\GuitarComment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarCommentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarCommentResource(GuitarComment::with(['guitar', 'user'])->get());
    }

    public function store(StoreGuitarCommentRequest $request)
    {
        $guitarComment = GuitarComment::create($request->all());

        return (new GuitarCommentResource($guitarComment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuitarComment $guitarComment)
    {
        abort_if(Gate::denies('guitar_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarCommentResource($guitarComment->load(['guitar', 'user']));
    }

    public function update(UpdateGuitarCommentRequest $request, GuitarComment $guitarComment)
    {
        $guitarComment->update($request->all());

        return (new GuitarCommentResource($guitarComment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuitarComment $guitarComment)
    {
        abort_if(Gate::denies('guitar_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarComment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

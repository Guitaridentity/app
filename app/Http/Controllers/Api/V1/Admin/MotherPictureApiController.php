<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMotherPictureRequest;
use App\Http\Requests\UpdateMotherPictureRequest;
use App\Http\Resources\Admin\MotherPictureResource;
use App\Models\MotherPicture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherPictureApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_picture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherPictureResource(MotherPicture::with(['mother'])->get());
    }

    public function store(StoreMotherPictureRequest $request)
    {
        $motherPicture = MotherPicture::create($request->all());

        return (new MotherPictureResource($motherPicture))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MotherPicture $motherPicture)
    {
        abort_if(Gate::denies('mother_picture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherPictureResource($motherPicture->load(['mother']));
    }

    public function update(UpdateMotherPictureRequest $request, MotherPicture $motherPicture)
    {
        $motherPicture->update($request->all());

        return (new MotherPictureResource($motherPicture))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MotherPicture $motherPicture)
    {
        abort_if(Gate::denies('mother_picture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherPicture->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

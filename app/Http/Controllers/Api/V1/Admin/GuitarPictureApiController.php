<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarPictureRequest;
use App\Http\Requests\UpdateGuitarPictureRequest;
use App\Http\Resources\Admin\GuitarPictureResource;
use App\Models\GuitarPicture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarPictureApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_picture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarPictureResource(GuitarPicture::with(['guitar'])->get());
    }

    public function store(StoreGuitarPictureRequest $request)
    {
        $guitarPicture = GuitarPicture::create($request->all());

        return (new GuitarPictureResource($guitarPicture))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuitarPicture $guitarPicture)
    {
        abort_if(Gate::denies('guitar_picture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarPictureResource($guitarPicture->load(['guitar']));
    }

    public function update(UpdateGuitarPictureRequest $request, GuitarPicture $guitarPicture)
    {
        $guitarPicture->update($request->all());

        return (new GuitarPictureResource($guitarPicture))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuitarPicture $guitarPicture)
    {
        abort_if(Gate::denies('guitar_picture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPicture->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

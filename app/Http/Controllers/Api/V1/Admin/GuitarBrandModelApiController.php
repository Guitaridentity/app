<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarBrandModelRequest;
use App\Http\Requests\UpdateGuitarBrandModelRequest;
use App\Http\Resources\Admin\GuitarBrandModelResource;
use App\Models\GuitarBrandModel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarBrandModelApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_brand_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarBrandModelResource(GuitarBrandModel::with(['guitar_brand'])->get());
    }

    public function store(StoreGuitarBrandModelRequest $request)
    {
        $guitarBrandModel = GuitarBrandModel::create($request->all());

        return (new GuitarBrandModelResource($guitarBrandModel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuitarBrandModel $guitarBrandModel)
    {
        abort_if(Gate::denies('guitar_brand_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarBrandModelResource($guitarBrandModel->load(['guitar_brand']));
    }

    public function update(UpdateGuitarBrandModelRequest $request, GuitarBrandModel $guitarBrandModel)
    {
        $guitarBrandModel->update($request->all());

        return (new GuitarBrandModelResource($guitarBrandModel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuitarBrandModel $guitarBrandModel)
    {
        abort_if(Gate::denies('guitar_brand_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarBrandModel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

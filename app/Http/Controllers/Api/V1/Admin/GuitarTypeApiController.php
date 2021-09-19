<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarTypeRequest;
use App\Http\Requests\UpdateGuitarTypeRequest;
use App\Http\Resources\Admin\GuitarTypeResource;
use App\Models\GuitarType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarTypeResource(GuitarType::all());
    }

    public function store(StoreGuitarTypeRequest $request)
    {
        $guitarType = GuitarType::create($request->all());

        return (new GuitarTypeResource($guitarType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuitarType $guitarType)
    {
        abort_if(Gate::denies('guitar_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarTypeResource($guitarType);
    }

    public function update(UpdateGuitarTypeRequest $request, GuitarType $guitarType)
    {
        $guitarType->update($request->all());

        return (new GuitarTypeResource($guitarType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuitarType $guitarType)
    {
        abort_if(Gate::denies('guitar_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

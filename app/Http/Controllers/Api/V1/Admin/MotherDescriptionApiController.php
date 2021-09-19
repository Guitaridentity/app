<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMotherDescriptionRequest;
use App\Http\Requests\UpdateMotherDescriptionRequest;
use App\Http\Resources\Admin\MotherDescriptionResource;
use App\Models\MotherDescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherDescriptionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherDescriptionResource(MotherDescription::with(['mother', 'user'])->get());
    }

    public function store(StoreMotherDescriptionRequest $request)
    {
        $motherDescription = MotherDescription::create($request->all());

        return (new MotherDescriptionResource($motherDescription))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MotherDescription $motherDescription)
    {
        abort_if(Gate::denies('mother_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherDescriptionResource($motherDescription->load(['mother', 'user']));
    }

    public function update(UpdateMotherDescriptionRequest $request, MotherDescription $motherDescription)
    {
        $motherDescription->update($request->all());

        return (new MotherDescriptionResource($motherDescription))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MotherDescription $motherDescription)
    {
        abort_if(Gate::denies('mother_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherDescription->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

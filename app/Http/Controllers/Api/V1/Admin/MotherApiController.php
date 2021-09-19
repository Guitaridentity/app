<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMotherRequest;
use App\Http\Requests\UpdateMotherRequest;
use App\Http\Resources\Admin\MotherResource;
use App\Models\Mother;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherResource(Mother::with(['guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color'])->get());
    }

    public function store(StoreMotherRequest $request)
    {
        $mother = Mother::create($request->all());

        return (new MotherResource($mother))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Mother $mother)
    {
        abort_if(Gate::denies('mother_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherResource($mother->load(['guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color']));
    }

    public function update(UpdateMotherRequest $request, Mother $mother)
    {
        $mother->update($request->all());

        return (new MotherResource($mother))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Mother $mother)
    {
        abort_if(Gate::denies('mother_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mother->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

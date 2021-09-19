<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarownerRequest;
use App\Http\Requests\UpdateGuitarownerRequest;
use App\Http\Resources\Admin\GuitarownerResource;
use App\Models\Guitarowner;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarownerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitarowner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarownerResource(Guitarowner::with(['user'])->get());
    }

    public function store(StoreGuitarownerRequest $request)
    {
        $guitarowner = Guitarowner::create($request->all());

        return (new GuitarownerResource($guitarowner))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Guitarowner $guitarowner)
    {
        abort_if(Gate::denies('guitarowner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarownerResource($guitarowner->load(['user']));
    }

    public function update(UpdateGuitarownerRequest $request, Guitarowner $guitarowner)
    {
        $guitarowner->update($request->all());

        return (new GuitarownerResource($guitarowner))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Guitarowner $guitarowner)
    {
        abort_if(Gate::denies('guitarowner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarowner->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarchangeRequest;
use App\Http\Requests\UpdateGuitarchangeRequest;
use App\Http\Resources\Admin\GuitarchangeResource;
use App\Models\Guitarchange;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarchangesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitarchange_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarchangeResource(Guitarchange::with(['guitar_owner'])->get());
    }

    public function store(StoreGuitarchangeRequest $request)
    {
        $guitarchange = Guitarchange::create($request->all());

        return (new GuitarchangeResource($guitarchange))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Guitarchange $guitarchange)
    {
        abort_if(Gate::denies('guitarchange_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarchangeResource($guitarchange->load(['guitar_owner']));
    }

    public function update(UpdateGuitarchangeRequest $request, Guitarchange $guitarchange)
    {
        $guitarchange->update($request->all());

        return (new GuitarchangeResource($guitarchange))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Guitarchange $guitarchange)
    {
        abort_if(Gate::denies('guitarchange_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarchange->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

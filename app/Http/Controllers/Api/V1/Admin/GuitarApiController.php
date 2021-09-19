<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarRequest;
use App\Http\Requests\UpdateGuitarRequest;
use App\Http\Resources\Admin\GuitarResource;
use App\Models\Guitar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarResource(Guitar::with(['guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color', 'guitar_owner'])->get());
    }

    public function store(StoreGuitarRequest $request)
    {
        $guitar = Guitar::create($request->all());

        return (new GuitarResource($guitar))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Guitar $guitar)
    {
        abort_if(Gate::denies('guitar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarResource($guitar->load(['guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color', 'guitar_owner']));
    }

    public function update(UpdateGuitarRequest $request, Guitar $guitar)
    {
        $guitar->update($request->all());

        return (new GuitarResource($guitar))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Guitar $guitar)
    {
        abort_if(Gate::denies('guitar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

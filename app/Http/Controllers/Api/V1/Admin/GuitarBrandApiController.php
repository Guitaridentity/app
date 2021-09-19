<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarBrandRequest;
use App\Http\Requests\UpdateGuitarBrandRequest;
use App\Http\Resources\Admin\GuitarBrandResource;
use App\Models\GuitarBrand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarBrandApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarBrandResource(GuitarBrand::all());
    }

    public function store(StoreGuitarBrandRequest $request)
    {
        $guitarBrand = GuitarBrand::create($request->all());

        return (new GuitarBrandResource($guitarBrand))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuitarBrand $guitarBrand)
    {
        abort_if(Gate::denies('guitar_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarBrandResource($guitarBrand);
    }

    public function update(UpdateGuitarBrandRequest $request, GuitarBrand $guitarBrand)
    {
        $guitarBrand->update($request->all());

        return (new GuitarBrandResource($guitarBrand))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuitarBrand $guitarBrand)
    {
        abort_if(Gate::denies('guitar_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarBrand->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

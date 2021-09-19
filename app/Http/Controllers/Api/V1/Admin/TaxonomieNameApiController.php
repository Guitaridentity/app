<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaxonomieNameRequest;
use App\Http\Requests\UpdateTaxonomieNameRequest;
use App\Http\Resources\Admin\TaxonomieNameResource;
use App\Models\TaxonomieName;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaxonomieNameApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('taxonomie_name_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaxonomieNameResource(TaxonomieName::all());
    }

    public function store(StoreTaxonomieNameRequest $request)
    {
        $taxonomieName = TaxonomieName::create($request->all());

        return (new TaxonomieNameResource($taxonomieName))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TaxonomieName $taxonomieName)
    {
        abort_if(Gate::denies('taxonomie_name_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaxonomieNameResource($taxonomieName);
    }

    public function update(UpdateTaxonomieNameRequest $request, TaxonomieName $taxonomieName)
    {
        $taxonomieName->update($request->all());

        return (new TaxonomieNameResource($taxonomieName))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TaxonomieName $taxonomieName)
    {
        abort_if(Gate::denies('taxonomie_name_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxonomieName->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

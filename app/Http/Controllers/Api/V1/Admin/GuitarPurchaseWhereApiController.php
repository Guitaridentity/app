<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarPurchaseWhereRequest;
use App\Http\Requests\UpdateGuitarPurchaseWhereRequest;
use App\Http\Resources\Admin\GuitarPurchaseWhereResource;
use App\Models\GuitarPurchaseWhere;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarPurchaseWhereApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_purchase_where_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarPurchaseWhereResource(GuitarPurchaseWhere::with(['guitar_purchase'])->get());
    }

    public function store(StoreGuitarPurchaseWhereRequest $request)
    {
        $guitarPurchaseWhere = GuitarPurchaseWhere::create($request->all());

        return (new GuitarPurchaseWhereResource($guitarPurchaseWhere))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuitarPurchaseWhere $guitarPurchaseWhere)
    {
        abort_if(Gate::denies('guitar_purchase_where_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarPurchaseWhereResource($guitarPurchaseWhere->load(['guitar_purchase']));
    }

    public function update(UpdateGuitarPurchaseWhereRequest $request, GuitarPurchaseWhere $guitarPurchaseWhere)
    {
        $guitarPurchaseWhere->update($request->all());

        return (new GuitarPurchaseWhereResource($guitarPurchaseWhere))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuitarPurchaseWhere $guitarPurchaseWhere)
    {
        abort_if(Gate::denies('guitar_purchase_where_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPurchaseWhere->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

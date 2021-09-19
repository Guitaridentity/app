<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarPurchasedRequest;
use App\Http\Requests\UpdateGuitarPurchasedRequest;
use App\Http\Resources\Admin\GuitarPurchasedResource;
use App\Models\GuitarPurchased;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarPurchasedApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_purchased_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarPurchasedResource(GuitarPurchased::with(['owner'])->get());
    }

    public function store(StoreGuitarPurchasedRequest $request)
    {
        $guitarPurchased = GuitarPurchased::create($request->all());

        return (new GuitarPurchasedResource($guitarPurchased))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuitarPurchased $guitarPurchased)
    {
        abort_if(Gate::denies('guitar_purchased_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarPurchasedResource($guitarPurchased->load(['owner']));
    }

    public function update(UpdateGuitarPurchasedRequest $request, GuitarPurchased $guitarPurchased)
    {
        $guitarPurchased->update($request->all());

        return (new GuitarPurchasedResource($guitarPurchased))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuitarPurchased $guitarPurchased)
    {
        abort_if(Gate::denies('guitar_purchased_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPurchased->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

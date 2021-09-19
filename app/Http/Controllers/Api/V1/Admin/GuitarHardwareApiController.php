<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuitarHardwareRequest;
use App\Http\Requests\UpdateGuitarHardwareRequest;
use App\Http\Resources\Admin\GuitarHardwareResource;
use App\Models\GuitarHardware;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarHardwareApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_hardware_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarHardwareResource(GuitarHardware::with(['guitar', 'country_produced', 'body_shape', 'top_material', 'neck_material', 'fretboard_material', 'body_finish', 'hardware_finish', 'bridge_type', 'pickup_neck', 'pickup_center', 'pickup_bridge'])->get());
    }

    public function store(StoreGuitarHardwareRequest $request)
    {
        $guitarHardware = GuitarHardware::create($request->all());

        return (new GuitarHardwareResource($guitarHardware))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuitarHardware $guitarHardware)
    {
        abort_if(Gate::denies('guitar_hardware_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuitarHardwareResource($guitarHardware->load(['guitar', 'country_produced', 'body_shape', 'top_material', 'neck_material', 'fretboard_material', 'body_finish', 'hardware_finish', 'bridge_type', 'pickup_neck', 'pickup_center', 'pickup_bridge']));
    }

    public function update(UpdateGuitarHardwareRequest $request, GuitarHardware $guitarHardware)
    {
        $guitarHardware->update($request->all());

        return (new GuitarHardwareResource($guitarHardware))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuitarHardware $guitarHardware)
    {
        abort_if(Gate::denies('guitar_hardware_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarHardware->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

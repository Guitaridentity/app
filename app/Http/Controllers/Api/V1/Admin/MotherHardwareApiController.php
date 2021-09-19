<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMotherHardwareRequest;
use App\Http\Requests\UpdateMotherHardwareRequest;
use App\Http\Resources\Admin\MotherHardwareResource;
use App\Models\MotherHardware;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherHardwareApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_hardware_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherHardwareResource(MotherHardware::with(['mother', 'country_produced', 'body_shape', 'top_material', 'neck_material', 'fretboard_material', 'body_finish', 'hardware_finish', 'bridge_type', 'pickup_neck', 'pickup_center', 'pickup_bridge'])->get());
    }

    public function store(StoreMotherHardwareRequest $request)
    {
        $motherHardware = MotherHardware::create($request->all());

        return (new MotherHardwareResource($motherHardware))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MotherHardware $motherHardware)
    {
        abort_if(Gate::denies('mother_hardware_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotherHardwareResource($motherHardware->load(['mother', 'country_produced', 'body_shape', 'top_material', 'neck_material', 'fretboard_material', 'body_finish', 'hardware_finish', 'bridge_type', 'pickup_neck', 'pickup_center', 'pickup_bridge']));
    }

    public function update(UpdateMotherHardwareRequest $request, MotherHardware $motherHardware)
    {
        $motherHardware->update($request->all());

        return (new MotherHardwareResource($motherHardware))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MotherHardware $motherHardware)
    {
        abort_if(Gate::denies('mother_hardware_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherHardware->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

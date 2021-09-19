<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestfunctionRequest;
use App\Http\Requests\UpdateTestfunctionRequest;
use App\Http\Resources\Admin\TestfunctionResource;
use App\Models\Testfunction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestfunctionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('testfunction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestfunctionResource(Testfunction::with(['user'])->get());
    }

    public function store(StoreTestfunctionRequest $request)
    {
        $testfunction = Testfunction::create($request->all());

        return (new TestfunctionResource($testfunction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Testfunction $testfunction)
    {
        abort_if(Gate::denies('testfunction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestfunctionResource($testfunction->load(['user']));
    }

    public function update(UpdateTestfunctionRequest $request, Testfunction $testfunction)
    {
        $testfunction->update($request->all());

        return (new TestfunctionResource($testfunction))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Testfunction $testfunction)
    {
        abort_if(Gate::denies('testfunction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testfunction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

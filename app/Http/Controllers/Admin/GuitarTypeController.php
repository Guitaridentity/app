<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarTypeRequest;
use App\Http\Requests\StoreGuitarTypeRequest;
use App\Http\Requests\UpdateGuitarTypeRequest;
use App\Models\GuitarType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarTypes = GuitarType::all();

        return view('admin.guitarTypes.index', compact('guitarTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guitarTypes.create');
    }

    public function store(StoreGuitarTypeRequest $request)
    {
        $guitarType = GuitarType::create($request->all());

        return redirect()->route('admin.guitar-types.index');
    }

    public function edit(GuitarType $guitarType)
    {
        abort_if(Gate::denies('guitar_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guitarTypes.edit', compact('guitarType'));
    }

    public function update(UpdateGuitarTypeRequest $request, GuitarType $guitarType)
    {
        $guitarType->update($request->all());

        return redirect()->route('admin.guitar-types.index');
    }

    public function show(GuitarType $guitarType)
    {
        abort_if(Gate::denies('guitar_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guitarTypes.show', compact('guitarType'));
    }

    public function destroy(GuitarType $guitarType)
    {
        abort_if(Gate::denies('guitar_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarType->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarTypeRequest $request)
    {
        GuitarType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

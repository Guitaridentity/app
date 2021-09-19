<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarvideoRequest;
use App\Http\Requests\StoreGuitarvideoRequest;
use App\Http\Requests\UpdateGuitarvideoRequest;
use App\Models\Guitar;
use App\Models\Guitarvideo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarvideoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitarvideo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarvideos = Guitarvideo::with(['guitar'])->get();

        return view('admin.guitarvideos.index', compact('guitarvideos'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitarvideo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarvideos.create', compact('guitars'));
    }

    public function store(StoreGuitarvideoRequest $request)
    {
        $guitarvideo = Guitarvideo::create($request->all());

        return redirect()->route('admin.guitarvideos.index');
    }

    public function edit(Guitarvideo $guitarvideo)
    {
        abort_if(Gate::denies('guitarvideo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarvideo->load('guitar');

        return view('admin.guitarvideos.edit', compact('guitars', 'guitarvideo'));
    }

    public function update(UpdateGuitarvideoRequest $request, Guitarvideo $guitarvideo)
    {
        $guitarvideo->update($request->all());

        return redirect()->route('admin.guitarvideos.index');
    }

    public function show(Guitarvideo $guitarvideo)
    {
        abort_if(Gate::denies('guitarvideo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarvideo->load('guitar');

        return view('admin.guitarvideos.show', compact('guitarvideo'));
    }

    public function destroy(Guitarvideo $guitarvideo)
    {
        abort_if(Gate::denies('guitarvideo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarvideo->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarvideoRequest $request)
    {
        Guitarvideo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

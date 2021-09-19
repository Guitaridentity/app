<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarchangeRequest;
use App\Http\Requests\StoreGuitarchangeRequest;
use App\Http\Requests\UpdateGuitarchangeRequest;
use App\Models\Guitarchange;
use App\Models\Guitarowner;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarchangesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitarchange_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarchanges = Guitarchange::with(['guitar_owner'])->get();

        return view('admin.guitarchanges.index', compact('guitarchanges'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitarchange_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_owners = Guitarowner::pluck('hix', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarchanges.create', compact('guitar_owners'));
    }

    public function store(StoreGuitarchangeRequest $request)
    {
        $guitarchange = Guitarchange::create($request->all());

        return redirect()->route('admin.guitarchanges.index');
    }

    public function edit(Guitarchange $guitarchange)
    {
        abort_if(Gate::denies('guitarchange_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_owners = Guitarowner::pluck('hix', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarchange->load('guitar_owner');

        return view('admin.guitarchanges.edit', compact('guitar_owners', 'guitarchange'));
    }

    public function update(UpdateGuitarchangeRequest $request, Guitarchange $guitarchange)
    {
        $guitarchange->update($request->all());

        return redirect()->route('admin.guitarchanges.index');
    }

    public function show(Guitarchange $guitarchange)
    {
        abort_if(Gate::denies('guitarchange_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarchange->load('guitar_owner');

        return view('admin.guitarchanges.show', compact('guitarchange'));
    }

    public function destroy(Guitarchange $guitarchange)
    {
        abort_if(Gate::denies('guitarchange_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarchange->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarchangeRequest $request)
    {
        Guitarchange::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

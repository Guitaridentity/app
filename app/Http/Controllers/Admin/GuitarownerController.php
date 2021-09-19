<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarownerRequest;
use App\Http\Requests\StoreGuitarownerRequest;
use App\Http\Requests\UpdateGuitarownerRequest;
use App\Models\Guitarowner;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarownerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitarowner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarowners = Guitarowner::with(['user'])->get();

        return view('admin.guitarowners.index', compact('guitarowners'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitarowner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarowners.create', compact('users'));
    }

    public function store(StoreGuitarownerRequest $request)
    {
        $guitarowner = Guitarowner::create($request->all());

        return redirect()->route('admin.guitarowners.index');
    }

    public function edit(Guitarowner $guitarowner)
    {
        abort_if(Gate::denies('guitarowner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarowner->load('user');

        return view('admin.guitarowners.edit', compact('users', 'guitarowner'));
    }

    public function update(UpdateGuitarownerRequest $request, Guitarowner $guitarowner)
    {
        $guitarowner->update($request->all());

        return redirect()->route('admin.guitarowners.index');
    }

    public function show(Guitarowner $guitarowner)
    {
        abort_if(Gate::denies('guitarowner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarowner->load('user', 'guitarOwnerGuitars');

        return view('admin.guitarowners.show', compact('guitarowner'));
    }

    public function destroy(Guitarowner $guitarowner)
    {
        abort_if(Gate::denies('guitarowner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarowner->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarownerRequest $request)
    {
        Guitarowner::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

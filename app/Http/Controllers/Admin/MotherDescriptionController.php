<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotherDescriptionRequest;
use App\Http\Requests\StoreMotherDescriptionRequest;
use App\Http\Requests\UpdateMotherDescriptionRequest;
use App\Models\Mother;
use App\Models\MotherDescription;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherDescriptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherDescriptions = MotherDescription::with(['mother', 'user'])->get();

        return view('admin.motherDescriptions.index', compact('motherDescriptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('mother_description_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.motherDescriptions.create', compact('mothers', 'users'));
    }

    public function store(StoreMotherDescriptionRequest $request)
    {
        $motherDescription = MotherDescription::create($request->all());

        return redirect()->route('admin.mother-descriptions.index');
    }

    public function edit(MotherDescription $motherDescription)
    {
        abort_if(Gate::denies('mother_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $motherDescription->load('mother', 'user');

        return view('admin.motherDescriptions.edit', compact('mothers', 'users', 'motherDescription'));
    }

    public function update(UpdateMotherDescriptionRequest $request, MotherDescription $motherDescription)
    {
        $motherDescription->update($request->all());

        return redirect()->route('admin.mother-descriptions.index');
    }

    public function show(MotherDescription $motherDescription)
    {
        abort_if(Gate::denies('mother_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherDescription->load('mother', 'user');

        return view('admin.motherDescriptions.show', compact('motherDescription'));
    }

    public function destroy(MotherDescription $motherDescription)
    {
        abort_if(Gate::denies('mother_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherDescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotherDescriptionRequest $request)
    {
        MotherDescription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

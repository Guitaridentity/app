<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotherPictureRequest;
use App\Http\Requests\StoreMotherPictureRequest;
use App\Http\Requests\UpdateMotherPictureRequest;
use App\Models\Mother;
use App\Models\MotherPicture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotherPictureController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mother_picture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherPictures = MotherPicture::with(['mother'])->get();

        return view('admin.motherPictures.index', compact('motherPictures'));
    }

    public function create()
    {
        abort_if(Gate::denies('mother_picture_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.motherPictures.create', compact('mothers'));
    }

    public function store(StoreMotherPictureRequest $request)
    {
        $motherPicture = MotherPicture::create($request->all());

        return redirect()->route('admin.mother-pictures.index');
    }

    public function edit(MotherPicture $motherPicture)
    {
        abort_if(Gate::denies('mother_picture_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mothers = Mother::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $motherPicture->load('mother');

        return view('admin.motherPictures.edit', compact('mothers', 'motherPicture'));
    }

    public function update(UpdateMotherPictureRequest $request, MotherPicture $motherPicture)
    {
        $motherPicture->update($request->all());

        return redirect()->route('admin.mother-pictures.index');
    }

    public function show(MotherPicture $motherPicture)
    {
        abort_if(Gate::denies('mother_picture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherPicture->load('mother');

        return view('admin.motherPictures.show', compact('motherPicture'));
    }

    public function destroy(MotherPicture $motherPicture)
    {
        abort_if(Gate::denies('mother_picture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motherPicture->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotherPictureRequest $request)
    {
        MotherPicture::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

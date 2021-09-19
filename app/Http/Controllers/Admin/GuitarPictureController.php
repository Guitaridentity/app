<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarPictureRequest;
use App\Http\Requests\StoreGuitarPictureRequest;
use App\Http\Requests\UpdateGuitarPictureRequest;
use App\Models\Guitar;
use App\Models\GuitarPicture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarPictureController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_picture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPictures = GuitarPicture::with(['guitar'])->get();

        return view('admin.guitarPictures.index', compact('guitarPictures'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_picture_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarPictures.create', compact('guitars'));
    }

    public function store(StoreGuitarPictureRequest $request)
    {
        $guitarPicture = GuitarPicture::create($request->all());

        return redirect()->route('admin.guitar-pictures.index');
    }

    public function edit(GuitarPicture $guitarPicture)
    {
        abort_if(Gate::denies('guitar_picture_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarPicture->load('guitar');

        return view('admin.guitarPictures.edit', compact('guitars', 'guitarPicture'));
    }

    public function update(UpdateGuitarPictureRequest $request, GuitarPicture $guitarPicture)
    {
        $guitarPicture->update($request->all());

        return redirect()->route('admin.guitar-pictures.index');
    }

    public function show(GuitarPicture $guitarPicture)
    {
        abort_if(Gate::denies('guitar_picture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPicture->load('guitar');

        return view('admin.guitarPictures.show', compact('guitarPicture'));
    }

    public function destroy(GuitarPicture $guitarPicture)
    {
        abort_if(Gate::denies('guitar_picture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPicture->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarPictureRequest $request)
    {
        GuitarPicture::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

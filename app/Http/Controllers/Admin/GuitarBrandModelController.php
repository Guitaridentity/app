<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyGuitarBrandModelRequest;
use App\Http\Requests\StoreGuitarBrandModelRequest;
use App\Http\Requests\UpdateGuitarBrandModelRequest;
use App\Models\GuitarBrand;
use App\Models\GuitarBrandModel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarBrandModelController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('guitar_brand_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarBrandModels = GuitarBrandModel::with(['guitar_brand'])->get();

        return view('admin.guitarBrandModels.index', compact('guitarBrandModels'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_brand_model_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_brands = GuitarBrand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarBrandModels.create', compact('guitar_brands'));
    }

    public function store(StoreGuitarBrandModelRequest $request)
    {
        $guitarBrandModel = GuitarBrandModel::create($request->all());

        return redirect()->route('admin.guitar-brand-models.index');
    }

    public function edit(GuitarBrandModel $guitarBrandModel)
    {
        abort_if(Gate::denies('guitar_brand_model_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_brands = GuitarBrand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarBrandModel->load('guitar_brand');

        return view('admin.guitarBrandModels.edit', compact('guitar_brands', 'guitarBrandModel'));
    }

    public function update(UpdateGuitarBrandModelRequest $request, GuitarBrandModel $guitarBrandModel)
    {
        $guitarBrandModel->update($request->all());

        return redirect()->route('admin.guitar-brand-models.index');
    }

    public function show(GuitarBrandModel $guitarBrandModel)
    {
        abort_if(Gate::denies('guitar_brand_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarBrandModel->load('guitar_brand');

        return view('admin.guitarBrandModels.show', compact('guitarBrandModel'));
    }

    public function destroy(GuitarBrandModel $guitarBrandModel)
    {
        abort_if(Gate::denies('guitar_brand_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarBrandModel->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarBrandModelRequest $request)
    {
        GuitarBrandModel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

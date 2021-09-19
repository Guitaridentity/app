<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMotherRequest;
use App\Http\Requests\StoreMotherRequest;
use App\Http\Requests\UpdateMotherRequest;
use App\Models\GuitarBrand;
use App\Models\GuitarBrandModel;
use App\Models\GuitarTaxonomy;
use App\Models\GuitarType;
use App\Models\Mother;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MotherController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('mother_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Mother::with(['guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color'])->select(sprintf('%s.*', (new Mother())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mother_show';
                $editGate = 'mother_edit';
                $deleteGate = 'mother_delete';
                $crudRoutePart = 'mothers';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->addColumn('guitar_type_name_en', function ($row) {
                return $row->guitar_type ? $row->guitar_type->name_en : '';
            });

            $table->addColumn('guitar_brand_name', function ($row) {
                return $row->guitar_brand ? $row->guitar_brand->name : '';
            });

            $table->addColumn('guitar_brand_model_name', function ($row) {
                return $row->guitar_brand_model ? $row->guitar_brand_model->name : '';
            });

            $table->addColumn('guitar_color_value', function ($row) {
                return $row->guitar_color ? $row->guitar_color->value : '';
            });

            $table->editColumn('strings_number', function ($row) {
                return $row->strings_number ? $row->strings_number : '';
            });
            $table->editColumn('image_url', function ($row) {
                return $row->image_url ? $row->image_url : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color']);

            return $table->make(true);
        }

        return view('admin.mothers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mother_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_types = GuitarType::pluck('name_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_brands = GuitarBrand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_brand_models = GuitarBrandModel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_colors = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mothers.create', compact('guitar_types', 'guitar_brands', 'guitar_brand_models', 'guitar_colors'));
    }

    public function store(StoreMotherRequest $request)
    {
        $mother = Mother::create($request->all());

        return redirect()->route('admin.mothers.index');
    }

    public function edit(Mother $mother)
    {
        abort_if(Gate::denies('mother_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_types = GuitarType::pluck('name_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_brands = GuitarBrand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_brand_models = GuitarBrandModel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_colors = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mother->load('guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color');

        return view('admin.mothers.edit', compact('guitar_types', 'guitar_brands', 'guitar_brand_models', 'guitar_colors', 'mother'));
    }

    public function update(UpdateMotherRequest $request, Mother $mother)
    {
        $mother->update($request->all());

        return redirect()->route('admin.mothers.index');
    }

    public function show(Mother $mother)
    {
        abort_if(Gate::denies('mother_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mother->load('guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color', 'motherMotherHardware', 'motherMotherComments');

        return view('admin.mothers.show', compact('mother'));
    }

    public function destroy(Mother $mother)
    {
        abort_if(Gate::denies('mother_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mother->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotherRequest $request)
    {
        Mother::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

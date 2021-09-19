<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarRequest;
use App\Http\Requests\StoreGuitarRequest;
use App\Http\Requests\UpdateGuitarRequest;
use App\Models\Guitar;
use App\Models\GuitarBrand;
use App\Models\GuitarBrandModel;
use App\Models\Guitarowner;
use App\Models\GuitarTaxonomy;
use App\Models\GuitarType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GuitarController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('guitar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Guitar::with(['guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color', 'guitar_owner'])->select(sprintf('%s.*', (new Guitar())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'guitar_show';
                $editGate = 'guitar_edit';
                $deleteGate = 'guitar_delete';
                $crudRoutePart = 'guitars';

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
            $table->addColumn('guitar_type_name_en', function ($row) {
                return $row->guitar_type ? $row->guitar_type->name_en : '';
            });

            $table->addColumn('guitar_brand_name', function ($row) {
                return $row->guitar_brand ? $row->guitar_brand->name : '';
            });

            $table->addColumn('guitar_brand_model_name', function ($row) {
                return $row->guitar_brand_model ? $row->guitar_brand_model->name : '';
            });

            $table->editColumn('serial', function ($row) {
                return $row->serial ? $row->serial : '';
            });
            $table->addColumn('guitar_color_value', function ($row) {
                return $row->guitar_color ? $row->guitar_color->value : '';
            });

            $table->editColumn('strings_number', function ($row) {
                return $row->strings_number ? $row->strings_number : '';
            });
            $table->editColumn('certified', function ($row) {
                return $row->certified ? $row->certified : '';
            });
            $table->editColumn('cert_code', function ($row) {
                return $row->cert_code ? $row->cert_code : '';
            });
            $table->editColumn('to_sell', function ($row) {
                return $row->to_sell ? $row->to_sell : '';
            });
            $table->editColumn('to_sell_price', function ($row) {
                return $row->to_sell_price ? $row->to_sell_price : '';
            });
            $table->addColumn('guitar_owner_hix', function ($row) {
                return $row->guitar_owner ? $row->guitar_owner->hix : '';
            });

            $table->editColumn('image_url', function ($row) {
                return $row->image_url ? $row->image_url : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color', 'guitar_owner']);

            return $table->make(true);
        }

        return view('admin.guitars.index');
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_types = GuitarType::pluck('name_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_brands = GuitarBrand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_brand_models = GuitarBrandModel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_colors = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_owners = Guitarowner::pluck('hix', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitars.create', compact('guitar_types', 'guitar_brands', 'guitar_brand_models', 'guitar_colors', 'guitar_owners'));
    }

    public function store(StoreGuitarRequest $request)
    {
        $guitar = Guitar::create($request->all());

        return redirect()->route('admin.guitars.index');
    }

    public function edit(Guitar $guitar)
    {
        abort_if(Gate::denies('guitar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_types = GuitarType::pluck('name_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_brands = GuitarBrand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_brand_models = GuitarBrandModel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_colors = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar_owners = Guitarowner::pluck('hix', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitar->load('guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color', 'guitar_owner');

        return view('admin.guitars.edit', compact('guitar_types', 'guitar_brands', 'guitar_brand_models', 'guitar_colors', 'guitar_owners', 'guitar'));
    }

    public function update(UpdateGuitarRequest $request, Guitar $guitar)
    {
        $guitar->update($request->all());

        return redirect()->route('admin.guitars.index');
    }

    public function show(Guitar $guitar)
    {
        abort_if(Gate::denies('guitar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar->load('guitar_type', 'guitar_brand', 'guitar_brand_model', 'guitar_color', 'guitar_owner', 'guitarGuitarHardware', 'guitarGuitarComments');

        return view('admin.guitars.show', compact('guitar'));
    }

    public function destroy(Guitar $guitar)
    {
        abort_if(Gate::denies('guitar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarRequest $request)
    {
        Guitar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

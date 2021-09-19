<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyGuitarBrandRequest;
use App\Http\Requests\StoreGuitarBrandRequest;
use App\Http\Requests\UpdateGuitarBrandRequest;
use App\Models\GuitarBrand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GuitarBrandController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('guitar_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GuitarBrand::query()->select(sprintf('%s.*', (new GuitarBrand())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'guitar_brand_show';
                $editGate = 'guitar_brand_edit';
                $deleteGate = 'guitar_brand_delete';
                $crudRoutePart = 'guitar-brands';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.guitarBrands.index');
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guitarBrands.create');
    }

    public function store(StoreGuitarBrandRequest $request)
    {
        $guitarBrand = GuitarBrand::create($request->all());

        return redirect()->route('admin.guitar-brands.index');
    }

    public function edit(GuitarBrand $guitarBrand)
    {
        abort_if(Gate::denies('guitar_brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guitarBrands.edit', compact('guitarBrand'));
    }

    public function update(UpdateGuitarBrandRequest $request, GuitarBrand $guitarBrand)
    {
        $guitarBrand->update($request->all());

        return redirect()->route('admin.guitar-brands.index');
    }

    public function show(GuitarBrand $guitarBrand)
    {
        abort_if(Gate::denies('guitar_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guitarBrands.show', compact('guitarBrand'));
    }

    public function destroy(GuitarBrand $guitarBrand)
    {
        abort_if(Gate::denies('guitar_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarBrand->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarBrandRequest $request)
    {
        GuitarBrand::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

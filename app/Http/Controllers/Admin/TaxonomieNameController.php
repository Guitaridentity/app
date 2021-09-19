<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaxonomieNameRequest;
use App\Http\Requests\StoreTaxonomieNameRequest;
use App\Http\Requests\UpdateTaxonomieNameRequest;
use App\Models\TaxonomieName;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TaxonomieNameController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('taxonomie_name_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TaxonomieName::query()->select(sprintf('%s.*', (new TaxonomieName())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'taxonomie_name_show';
                $editGate = 'taxonomie_name_edit';
                $deleteGate = 'taxonomie_name_delete';
                $crudRoutePart = 'taxonomie-names';

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
            $table->editColumn('name_en', function ($row) {
                return $row->name_en ? $row->name_en : '';
            });
            $table->editColumn('name_it', function ($row) {
                return $row->name_it ? $row->name_it : '';
            });
            $table->editColumn('name_es', function ($row) {
                return $row->name_es ? $row->name_es : '';
            });
            $table->editColumn('name_ja', function ($row) {
                return $row->name_ja ? $row->name_ja : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.taxonomieNames.index');
    }

    public function create()
    {
        abort_if(Gate::denies('taxonomie_name_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taxonomieNames.create');
    }

    public function store(StoreTaxonomieNameRequest $request)
    {
        $taxonomieName = TaxonomieName::create($request->all());

        return redirect()->route('admin.taxonomie-names.index');
    }

    public function edit(TaxonomieName $taxonomieName)
    {
        abort_if(Gate::denies('taxonomie_name_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taxonomieNames.edit', compact('taxonomieName'));
    }

    public function update(UpdateTaxonomieNameRequest $request, TaxonomieName $taxonomieName)
    {
        $taxonomieName->update($request->all());

        return redirect()->route('admin.taxonomie-names.index');
    }

    public function show(TaxonomieName $taxonomieName)
    {
        abort_if(Gate::denies('taxonomie_name_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taxonomieNames.show', compact('taxonomieName'));
    }

    public function destroy(TaxonomieName $taxonomieName)
    {
        abort_if(Gate::denies('taxonomie_name_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxonomieName->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaxonomieNameRequest $request)
    {
        TaxonomieName::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarTaxonomyRequest;
use App\Http\Requests\StoreGuitarTaxonomyRequest;
use App\Http\Requests\UpdateGuitarTaxonomyRequest;
use App\Models\GuitarTaxonomy;
use App\Models\TaxonomieName;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarTaxonomiesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_taxonomy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarTaxonomies = GuitarTaxonomy::with(['taxonomy'])->get();

        return view('admin.guitarTaxonomies.index', compact('guitarTaxonomies'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_taxonomy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxonomies = TaxonomieName::pluck('name_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarTaxonomies.create', compact('taxonomies'));
    }

    public function store(StoreGuitarTaxonomyRequest $request)
    {
        $guitarTaxonomy = GuitarTaxonomy::create($request->all());

        return redirect()->route('admin.guitar-taxonomies.index');
    }

    public function edit(GuitarTaxonomy $guitarTaxonomy)
    {
        abort_if(Gate::denies('guitar_taxonomy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxonomies = TaxonomieName::pluck('name_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarTaxonomy->load('taxonomy');

        return view('admin.guitarTaxonomies.edit', compact('taxonomies', 'guitarTaxonomy'));
    }

    public function update(UpdateGuitarTaxonomyRequest $request, GuitarTaxonomy $guitarTaxonomy)
    {
        $guitarTaxonomy->update($request->all());

        return redirect()->route('admin.guitar-taxonomies.index');
    }

    public function show(GuitarTaxonomy $guitarTaxonomy)
    {
        abort_if(Gate::denies('guitar_taxonomy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarTaxonomy->load('taxonomy');

        return view('admin.guitarTaxonomies.show', compact('guitarTaxonomy'));
    }

    public function destroy(GuitarTaxonomy $guitarTaxonomy)
    {
        abort_if(Gate::denies('guitar_taxonomy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarTaxonomy->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarTaxonomyRequest $request)
    {
        GuitarTaxonomy::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

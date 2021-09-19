<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarPurchaseWhereRequest;
use App\Http\Requests\StoreGuitarPurchaseWhereRequest;
use App\Http\Requests\UpdateGuitarPurchaseWhereRequest;
use App\Models\GuitarPurchased;
use App\Models\GuitarPurchaseWhere;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarPurchaseWhereController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_purchase_where_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPurchaseWheres = GuitarPurchaseWhere::with(['guitar_purchase'])->get();

        return view('admin.guitarPurchaseWheres.index', compact('guitarPurchaseWheres'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_purchase_where_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_purchases = GuitarPurchased::pluck('purchased_who', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarPurchaseWheres.create', compact('guitar_purchases'));
    }

    public function store(StoreGuitarPurchaseWhereRequest $request)
    {
        $guitarPurchaseWhere = GuitarPurchaseWhere::create($request->all());

        return redirect()->route('admin.guitar-purchase-wheres.index');
    }

    public function edit(GuitarPurchaseWhere $guitarPurchaseWhere)
    {
        abort_if(Gate::denies('guitar_purchase_where_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitar_purchases = GuitarPurchased::pluck('purchased_who', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarPurchaseWhere->load('guitar_purchase');

        return view('admin.guitarPurchaseWheres.edit', compact('guitar_purchases', 'guitarPurchaseWhere'));
    }

    public function update(UpdateGuitarPurchaseWhereRequest $request, GuitarPurchaseWhere $guitarPurchaseWhere)
    {
        $guitarPurchaseWhere->update($request->all());

        return redirect()->route('admin.guitar-purchase-wheres.index');
    }

    public function show(GuitarPurchaseWhere $guitarPurchaseWhere)
    {
        abort_if(Gate::denies('guitar_purchase_where_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPurchaseWhere->load('guitar_purchase');

        return view('admin.guitarPurchaseWheres.show', compact('guitarPurchaseWhere'));
    }

    public function destroy(GuitarPurchaseWhere $guitarPurchaseWhere)
    {
        abort_if(Gate::denies('guitar_purchase_where_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPurchaseWhere->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarPurchaseWhereRequest $request)
    {
        GuitarPurchaseWhere::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarPurchasedRequest;
use App\Http\Requests\StoreGuitarPurchasedRequest;
use App\Http\Requests\UpdateGuitarPurchasedRequest;
use App\Models\Guitarowner;
use App\Models\GuitarPurchased;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuitarPurchasedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guitar_purchased_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPurchaseds = GuitarPurchased::with(['owner'])->get();

        return view('admin.guitarPurchaseds.index', compact('guitarPurchaseds'));
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_purchased_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = Guitarowner::pluck('hix', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarPurchaseds.create', compact('owners'));
    }

    public function store(StoreGuitarPurchasedRequest $request)
    {
        $guitarPurchased = GuitarPurchased::create($request->all());

        return redirect()->route('admin.guitar-purchaseds.index');
    }

    public function edit(GuitarPurchased $guitarPurchased)
    {
        abort_if(Gate::denies('guitar_purchased_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = Guitarowner::pluck('hix', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarPurchased->load('owner');

        return view('admin.guitarPurchaseds.edit', compact('owners', 'guitarPurchased'));
    }

    public function update(UpdateGuitarPurchasedRequest $request, GuitarPurchased $guitarPurchased)
    {
        $guitarPurchased->update($request->all());

        return redirect()->route('admin.guitar-purchaseds.index');
    }

    public function show(GuitarPurchased $guitarPurchased)
    {
        abort_if(Gate::denies('guitar_purchased_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPurchased->load('owner');

        return view('admin.guitarPurchaseds.show', compact('guitarPurchased'));
    }

    public function destroy(GuitarPurchased $guitarPurchased)
    {
        abort_if(Gate::denies('guitar_purchased_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarPurchased->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarPurchasedRequest $request)
    {
        GuitarPurchased::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

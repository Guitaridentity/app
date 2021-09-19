<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuitarHardwareRequest;
use App\Http\Requests\StoreGuitarHardwareRequest;
use App\Http\Requests\UpdateGuitarHardwareRequest;
use App\Models\Country;
use App\Models\Guitar;
use App\Models\GuitarHardware;
use App\Models\GuitarTaxonomy;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GuitarHardwareController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('guitar_hardware_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GuitarHardware::with(['guitar', 'country_produced', 'body_shape', 'top_material', 'neck_material', 'fretboard_material', 'body_finish', 'hardware_finish', 'bridge_type', 'pickup_neck', 'pickup_center', 'pickup_bridge'])->select(sprintf('%s.*', (new GuitarHardware())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'guitar_hardware_show';
                $editGate = 'guitar_hardware_edit';
                $deleteGate = 'guitar_hardware_delete';
                $crudRoutePart = 'guitar-hardware';

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
            $table->addColumn('guitar_serial', function ($row) {
                return $row->guitar ? $row->guitar->serial : '';
            });

            $table->editColumn('guitar_production_year', function ($row) {
                return $row->guitar_production_year ? $row->guitar_production_year : '';
            });
            $table->addColumn('country_produced_name', function ($row) {
                return $row->country_produced ? $row->country_produced->name : '';
            });

            $table->addColumn('body_shape_value', function ($row) {
                return $row->body_shape ? $row->body_shape->value : '';
            });

            $table->addColumn('top_material_value', function ($row) {
                return $row->top_material ? $row->top_material->value : '';
            });

            $table->addColumn('neck_material_value', function ($row) {
                return $row->neck_material ? $row->neck_material->value : '';
            });

            $table->addColumn('fretboard_material_value', function ($row) {
                return $row->fretboard_material ? $row->fretboard_material->value : '';
            });

            $table->addColumn('body_finish_value', function ($row) {
                return $row->body_finish ? $row->body_finish->value : '';
            });

            $table->addColumn('hardware_finish_value', function ($row) {
                return $row->hardware_finish ? $row->hardware_finish->value : '';
            });

            $table->addColumn('bridge_type_value', function ($row) {
                return $row->bridge_type ? $row->bridge_type->value : '';
            });

            $table->editColumn('pickup_number', function ($row) {
                return $row->pickup_number ? $row->pickup_number : '';
            });
            $table->editColumn('pickup_configuration', function ($row) {
                return $row->pickup_configuration ? $row->pickup_configuration : '';
            });
            $table->addColumn('pickup_neck_value', function ($row) {
                return $row->pickup_neck ? $row->pickup_neck->value : '';
            });

            $table->addColumn('pickup_center_value', function ($row) {
                return $row->pickup_center ? $row->pickup_center->value : '';
            });

            $table->addColumn('pickup_bridge_value', function ($row) {
                return $row->pickup_bridge ? $row->pickup_bridge->value : '';
            });

            $table->editColumn('is_left_handed', function ($row) {
                return $row->is_left_handed ? $row->is_left_handed : '';
            });
            $table->editColumn('decription', function ($row) {
                return $row->decription ? $row->decription : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'guitar', 'country_produced', 'body_shape', 'top_material', 'neck_material', 'fretboard_material', 'body_finish', 'hardware_finish', 'bridge_type', 'pickup_neck', 'pickup_center', 'pickup_bridge']);

            return $table->make(true);
        }

        return view('admin.guitarHardware.index');
    }

    public function create()
    {
        abort_if(Gate::denies('guitar_hardware_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $country_produceds = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $body_shapes = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $top_materials = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $neck_materials = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fretboard_materials = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $body_finishes = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hardware_finishes = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bridge_types = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_necks = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_centers = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_bridges = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guitarHardware.create', compact('guitars', 'country_produceds', 'body_shapes', 'top_materials', 'neck_materials', 'fretboard_materials', 'body_finishes', 'hardware_finishes', 'bridge_types', 'pickup_necks', 'pickup_centers', 'pickup_bridges'));
    }

    public function store(StoreGuitarHardwareRequest $request)
    {
        $guitarHardware = GuitarHardware::create($request->all());

        return redirect()->route('admin.guitar-hardware.index');
    }

    public function edit(GuitarHardware $guitarHardware)
    {
        abort_if(Gate::denies('guitar_hardware_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitars = Guitar::pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $country_produceds = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $body_shapes = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $top_materials = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $neck_materials = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fretboard_materials = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $body_finishes = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hardware_finishes = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bridge_types = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_necks = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_centers = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_bridges = GuitarTaxonomy::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guitarHardware->load('guitar', 'country_produced', 'body_shape', 'top_material', 'neck_material', 'fretboard_material', 'body_finish', 'hardware_finish', 'bridge_type', 'pickup_neck', 'pickup_center', 'pickup_bridge');

        return view('admin.guitarHardware.edit', compact('guitars', 'country_produceds', 'body_shapes', 'top_materials', 'neck_materials', 'fretboard_materials', 'body_finishes', 'hardware_finishes', 'bridge_types', 'pickup_necks', 'pickup_centers', 'pickup_bridges', 'guitarHardware'));
    }

    public function update(UpdateGuitarHardwareRequest $request, GuitarHardware $guitarHardware)
    {
        $guitarHardware->update($request->all());

        return redirect()->route('admin.guitar-hardware.index');
    }

    public function show(GuitarHardware $guitarHardware)
    {
        abort_if(Gate::denies('guitar_hardware_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarHardware->load('guitar', 'country_produced', 'body_shape', 'top_material', 'neck_material', 'fretboard_material', 'body_finish', 'hardware_finish', 'bridge_type', 'pickup_neck', 'pickup_center', 'pickup_bridge');

        return view('admin.guitarHardware.show', compact('guitarHardware'));
    }

    public function destroy(GuitarHardware $guitarHardware)
    {
        abort_if(Gate::denies('guitar_hardware_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guitarHardware->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuitarHardwareRequest $request)
    {
        GuitarHardware::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

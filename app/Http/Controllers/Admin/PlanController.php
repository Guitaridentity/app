<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlanRequest;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Plan::with(['roles'])->select(sprintf('%s.*', (new Plan())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'plan_show';
                $editGate = 'plan_edit';
                $deleteGate = 'plan_delete';
                $crudRoutePart = 'plans';

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
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('certification', function ($row) {
                return $row->certification ? $row->certification : '';
            });
            $table->editColumn('picture', function ($row) {
                return $row->picture ? $row->picture : '';
            });
            $table->editColumn('video', function ($row) {
                return $row->video ? $row->video : '';
            });
            $table->editColumn('events', function ($row) {
                return $row->events ? $row->events : '';
            });
            $table->editColumn('courses', function ($row) {
                return $row->courses ? $row->courses : '';
            });
            $table->editColumn('month', function ($row) {
                return $row->month ? $row->month : '';
            });
            $table->editColumn('roles', function ($row) {
                $labels = [];
                foreach ($row->roles as $role) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $role->title);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'roles']);

            return $table->make(true);
        }

        return view('admin.plans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('plan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('admin.plans.create', compact('roles'));
    }

    public function store(StorePlanRequest $request)
    {
        $plan = Plan::create($request->all());
        $plan->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.plans.index');
    }

    public function edit(Plan $plan)
    {
        abort_if(Gate::denies('plan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $plan->load('roles');

        return view('admin.plans.edit', compact('roles', 'plan'));
    }

    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $plan->update($request->all());
        $plan->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.plans.index');
    }

    public function show(Plan $plan)
    {
        abort_if(Gate::denies('plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plan->load('roles');

        return view('admin.plans.show', compact('plan'));
    }

    public function destroy(Plan $plan)
    {
        abort_if(Gate::denies('plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plan->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlanRequest $request)
    {
        Plan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

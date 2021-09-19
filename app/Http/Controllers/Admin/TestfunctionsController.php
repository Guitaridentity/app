<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTestfunctionRequest;
use App\Http\Requests\StoreTestfunctionRequest;
use App\Http\Requests\UpdateTestfunctionRequest;
use App\Models\Testfunction;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TestfunctionsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('testfunction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Testfunction::with(['user'])->select(sprintf('%s.*', (new Testfunction())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'testfunction_show';
                $editGate = 'testfunction_edit';
                $deleteGate = 'testfunction_delete';
                $crudRoutePart = 'testfunctions';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('text', function ($row) {
                return $row->text ? $row->text : '';
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        $users = User::get();

        return view('admin.testfunctions.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('testfunction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.testfunctions.create', compact('users'));
    }

    public function store(StoreTestfunctionRequest $request)
    {
        $testfunction = Testfunction::create($request->all());

        return redirect()->route('admin.testfunctions.index');
    }

    public function edit(Testfunction $testfunction)
    {
        abort_if(Gate::denies('testfunction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $testfunction->load('user');

        return view('admin.testfunctions.edit', compact('users', 'testfunction'));
    }

    public function update(UpdateTestfunctionRequest $request, Testfunction $testfunction)
    {
        $testfunction->update($request->all());

        return redirect()->route('admin.testfunctions.index');
    }

    public function show(Testfunction $testfunction)
    {
        abort_if(Gate::denies('testfunction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testfunction->load('user');

        return view('admin.testfunctions.show', compact('testfunction'));
    }

    public function destroy(Testfunction $testfunction)
    {
        abort_if(Gate::denies('testfunction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testfunction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestfunctionRequest $request)
    {
        Testfunction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

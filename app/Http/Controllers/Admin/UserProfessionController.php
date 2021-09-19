<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserProfessionRequest;
use App\Http\Requests\StoreUserProfessionRequest;
use App\Http\Requests\UpdateUserProfessionRequest;
use App\Models\UserProfession;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UserProfessionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_profession_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = UserProfession::query()->select(sprintf('%s.*', (new UserProfession())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'user_profession_show';
                $editGate = 'user_profession_edit';
                $deleteGate = 'user_profession_delete';
                $crudRoutePart = 'user-professions';

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

        return view('admin.userProfessions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('user_profession_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userProfessions.create');
    }

    public function store(StoreUserProfessionRequest $request)
    {
        $userProfession = UserProfession::create($request->all());

        return redirect()->route('admin.user-professions.index');
    }

    public function edit(UserProfession $userProfession)
    {
        abort_if(Gate::denies('user_profession_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userProfessions.edit', compact('userProfession'));
    }

    public function update(UpdateUserProfessionRequest $request, UserProfession $userProfession)
    {
        $userProfession->update($request->all());

        return redirect()->route('admin.user-professions.index');
    }

    public function show(UserProfession $userProfession)
    {
        abort_if(Gate::denies('user_profession_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userProfessions.show', compact('userProfession'));
    }

    public function destroy(UserProfession $userProfession)
    {
        abort_if(Gate::denies('user_profession_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userProfession->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserProfessionRequest $request)
    {
        UserProfession::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

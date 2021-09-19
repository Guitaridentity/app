<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserAddressRequest;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;
use App\Models\User;
use App\Models\UserAddress;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UserAddressController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = UserAddress::with(['user'])->select(sprintf('%s.*', (new UserAddress())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'user_address_show';
                $editGate = 'user_address_edit';
                $deleteGate = 'user_address_delete';
                $crudRoutePart = 'user-addresses';

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
            $table->addColumn('user_email', function ($row) {
                return $row->user ? $row->user->email : '';
            });

            $table->editColumn('town', function ($row) {
                return $row->town ? $row->town : '';
            });
            $table->editColumn('province', function ($row) {
                return $row->province ? $row->province : '';
            });
            $table->editColumn('state', function ($row) {
                return $row->state ? $row->state : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->editColumn('zip', function ($row) {
                return $row->zip ? $row->zip : '';
            });
            $table->editColumn('latitude', function ($row) {
                return $row->latitude ? $row->latitude : '';
            });
            $table->editColumn('longitude', function ($row) {
                return $row->longitude ? $row->longitude : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.userAddresses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('user_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userAddresses.create', compact('users'));
    }

    public function store(StoreUserAddressRequest $request)
    {
        $userAddress = UserAddress::create($request->all());

        return redirect()->route('admin.user-addresses.index');
    }

    public function edit(UserAddress $userAddress)
    {
        abort_if(Gate::denies('user_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userAddress->load('user');

        return view('admin.userAddresses.edit', compact('users', 'userAddress'));
    }

    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress)
    {
        $userAddress->update($request->all());

        return redirect()->route('admin.user-addresses.index');
    }

    public function show(UserAddress $userAddress)
    {
        abort_if(Gate::denies('user_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userAddress->load('user');

        return view('admin.userAddresses.show', compact('userAddress'));
    }

    public function destroy(UserAddress $userAddress)
    {
        abort_if(Gate::denies('user_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userAddress->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserAddressRequest $request)
    {
        UserAddress::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

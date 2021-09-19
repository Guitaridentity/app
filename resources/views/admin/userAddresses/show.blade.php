@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userAddress.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userAddress.fields.id') }}
                        </th>
                        <td>
                            {{ $userAddress->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAddress.fields.user') }}
                        </th>
                        <td>
                            {{ $userAddress->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAddress.fields.town') }}
                        </th>
                        <td>
                            {{ $userAddress->town }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAddress.fields.province') }}
                        </th>
                        <td>
                            {{ $userAddress->province }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAddress.fields.state') }}
                        </th>
                        <td>
                            {{ $userAddress->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAddress.fields.country') }}
                        </th>
                        <td>
                            {{ $userAddress->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAddress.fields.zip') }}
                        </th>
                        <td>
                            {{ $userAddress->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAddress.fields.latitude') }}
                        </th>
                        <td>
                            {{ $userAddress->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAddress.fields.longitude') }}
                        </th>
                        <td>
                            {{ $userAddress->longitude }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarvideo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitarvideos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarvideo.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarvideo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarvideo.fields.guitar') }}
                        </th>
                        <td>
                            {{ $guitarvideo->guitar->serial ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarvideo.fields.url') }}
                        </th>
                        <td>
                            {{ $guitarvideo->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitarvideos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
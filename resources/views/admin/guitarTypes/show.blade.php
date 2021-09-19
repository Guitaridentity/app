@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarType.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarType.fields.name_en') }}
                        </th>
                        <td>
                            {{ $guitarType->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarType.fields.name_it') }}
                        </th>
                        <td>
                            {{ $guitarType->name_it }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarType.fields.name_es') }}
                        </th>
                        <td>
                            {{ $guitarType->name_es }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarType.fields.name_ja') }}
                        </th>
                        <td>
                            {{ $guitarType->name_ja }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
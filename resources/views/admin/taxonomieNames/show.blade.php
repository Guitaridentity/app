@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.taxonomieName.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.taxonomie-names.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.taxonomieName.fields.id') }}
                        </th>
                        <td>
                            {{ $taxonomieName->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taxonomieName.fields.name_en') }}
                        </th>
                        <td>
                            {{ $taxonomieName->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taxonomieName.fields.name_it') }}
                        </th>
                        <td>
                            {{ $taxonomieName->name_it }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taxonomieName.fields.name_es') }}
                        </th>
                        <td>
                            {{ $taxonomieName->name_es }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taxonomieName.fields.name_ja') }}
                        </th>
                        <td>
                            {{ $taxonomieName->name_ja }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.taxonomie-names.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
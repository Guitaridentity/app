@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userProfession.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-professions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfession.fields.id') }}
                        </th>
                        <td>
                            {{ $userProfession->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfession.fields.name_en') }}
                        </th>
                        <td>
                            {{ $userProfession->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfession.fields.name_it') }}
                        </th>
                        <td>
                            {{ $userProfession->name_it }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfession.fields.name_es') }}
                        </th>
                        <td>
                            {{ $userProfession->name_es }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userProfession.fields.name_ja') }}
                        </th>
                        <td>
                            {{ $userProfession->name_ja }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-professions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
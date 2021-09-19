@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarowner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitarowners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarowner.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarowner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarowner.fields.hix') }}
                        </th>
                        <td>
                            {{ $guitarowner->hix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarowner.fields.user') }}
                        </th>
                        <td>
                            {{ $guitarowner->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitarowners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#guitar_owner_guitars" role="tab" data-toggle="tab">
                {{ trans('cruds.guitar.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="guitar_owner_guitars">
            @includeIf('admin.guitarowners.relationships.guitarOwnerGuitars', ['guitars' => $guitarowner->guitarOwnerGuitars])
        </div>
    </div>
</div>

@endsection
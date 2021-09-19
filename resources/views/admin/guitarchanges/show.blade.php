@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarchange.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitarchanges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarchange.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarchange->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarchange.fields.guitar_owner') }}
                        </th>
                        <td>
                            {{ $guitarchange->guitar_owner->hix ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarchange.fields.description') }}
                        </th>
                        <td>
                            {{ $guitarchange->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarchange.fields.date_change') }}
                        </th>
                        <td>
                            {{ $guitarchange->date_change }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarchange.fields.done_by') }}
                        </th>
                        <td>
                            {{ $guitarchange->done_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitarchanges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
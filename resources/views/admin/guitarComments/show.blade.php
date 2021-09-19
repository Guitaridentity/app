@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarComment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarComment.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarComment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarComment.fields.guitar') }}
                        </th>
                        <td>
                            {{ $guitarComment->guitar->serial ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarComment.fields.user') }}
                        </th>
                        <td>
                            {{ $guitarComment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarComment.fields.comment') }}
                        </th>
                        <td>
                            {{ $guitarComment->comment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarComment.fields.signaled') }}
                        </th>
                        <td>
                            {{ $guitarComment->signaled }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarComment.fields.disabled') }}
                        </th>
                        <td>
                            {{ $guitarComment->disabled }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarComment.fields.likes') }}
                        </th>
                        <td>
                            {{ $guitarComment->likes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
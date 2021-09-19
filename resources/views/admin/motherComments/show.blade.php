@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.motherComment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mother-comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.motherComment.fields.id') }}
                        </th>
                        <td>
                            {{ $motherComment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherComment.fields.mother') }}
                        </th>
                        <td>
                            {{ $motherComment->mother->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherComment.fields.comment') }}
                        </th>
                        <td>
                            {{ $motherComment->comment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherComment.fields.signaled') }}
                        </th>
                        <td>
                            {{ $motherComment->signaled }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherComment.fields.disabled') }}
                        </th>
                        <td>
                            {{ $motherComment->disabled }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherComment.fields.likes') }}
                        </th>
                        <td>
                            {{ $motherComment->likes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mother-comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
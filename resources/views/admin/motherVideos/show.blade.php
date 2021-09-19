@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.motherVideo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mother-videos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.motherVideo.fields.id') }}
                        </th>
                        <td>
                            {{ $motherVideo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherVideo.fields.mother') }}
                        </th>
                        <td>
                            {{ $motherVideo->mother->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherVideo.fields.url') }}
                        </th>
                        <td>
                            {{ $motherVideo->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mother-videos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
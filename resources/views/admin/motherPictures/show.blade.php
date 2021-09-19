@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.motherPicture.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mother-pictures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.motherPicture.fields.id') }}
                        </th>
                        <td>
                            {{ $motherPicture->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherPicture.fields.mother') }}
                        </th>
                        <td>
                            {{ $motherPicture->mother->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherPicture.fields.url') }}
                        </th>
                        <td>
                            {{ $motherPicture->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mother-pictures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
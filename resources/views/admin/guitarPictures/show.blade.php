@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarPicture.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-pictures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPicture.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarPicture->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPicture.fields.guitar') }}
                        </th>
                        <td>
                            {{ $guitarPicture->guitar->serial ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPicture.fields.url') }}
                        </th>
                        <td>
                            {{ $guitarPicture->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-pictures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
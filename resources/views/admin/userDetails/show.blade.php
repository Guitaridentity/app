@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $userDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.text') }}
                        </th>
                        <td>
                            {{ $userDetail->text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.www') }}
                        </th>
                        <td>
                            {{ $userDetail->www }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.facebook') }}
                        </th>
                        <td>
                            {{ $userDetail->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.instagram') }}
                        </th>
                        <td>
                            {{ $userDetail->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.twitter') }}
                        </th>
                        <td>
                            {{ $userDetail->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.youtube') }}
                        </th>
                        <td>
                            {{ $userDetail->youtube }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.tiktok') }}
                        </th>
                        <td>
                            {{ $userDetail->tiktok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.soundcloud') }}
                        </th>
                        <td>
                            {{ $userDetail->soundcloud }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.drooble') }}
                        </th>
                        <td>
                            {{ $userDetail->drooble }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $userDetail->linkedin }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.plan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.id') }}
                        </th>
                        <td>
                            {{ $plan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.name') }}
                        </th>
                        <td>
                            {{ $plan->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.price') }}
                        </th>
                        <td>
                            {{ $plan->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.certification') }}
                        </th>
                        <td>
                            {{ $plan->certification }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.picture') }}
                        </th>
                        <td>
                            {{ $plan->picture }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.video') }}
                        </th>
                        <td>
                            {{ $plan->video }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.events') }}
                        </th>
                        <td>
                            {{ $plan->events }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.courses') }}
                        </th>
                        <td>
                            {{ $plan->courses }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.month') }}
                        </th>
                        <td>
                            {{ $plan->month }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.roles') }}
                        </th>
                        <td>
                            @foreach($plan->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
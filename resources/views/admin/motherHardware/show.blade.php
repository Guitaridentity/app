@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.motherHardware.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mother-hardware.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.id') }}
                        </th>
                        <td>
                            {{ $motherHardware->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.mother') }}
                        </th>
                        <td>
                            {{ $motherHardware->mother->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.guitar_production_year') }}
                        </th>
                        <td>
                            {{ $motherHardware->guitar_production_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.country_produced') }}
                        </th>
                        <td>
                            {{ $motherHardware->country_produced->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.body_shape') }}
                        </th>
                        <td>
                            {{ $motherHardware->body_shape->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.top_material') }}
                        </th>
                        <td>
                            {{ $motherHardware->top_material->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.neck_material') }}
                        </th>
                        <td>
                            {{ $motherHardware->neck_material->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.fretboard_material') }}
                        </th>
                        <td>
                            {{ $motherHardware->fretboard_material->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.body_finish') }}
                        </th>
                        <td>
                            {{ $motherHardware->body_finish->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.hardware_finish') }}
                        </th>
                        <td>
                            {{ $motherHardware->hardware_finish->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.bridge_type') }}
                        </th>
                        <td>
                            {{ $motherHardware->bridge_type->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_number') }}
                        </th>
                        <td>
                            {{ $motherHardware->pickup_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_configuration') }}
                        </th>
                        <td>
                            {{ $motherHardware->pickup_configuration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_neck') }}
                        </th>
                        <td>
                            {{ $motherHardware->pickup_neck->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_center') }}
                        </th>
                        <td>
                            {{ $motherHardware->pickup_center->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_bridge') }}
                        </th>
                        <td>
                            {{ $motherHardware->pickup_bridge->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.is_left_handed') }}
                        </th>
                        <td>
                            {{ $motherHardware->is_left_handed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.motherHardware.fields.decription') }}
                        </th>
                        <td>
                            {{ $motherHardware->decription }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mother-hardware.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
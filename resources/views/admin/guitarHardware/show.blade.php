@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarHardware.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-hardware.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarHardware->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.guitar') }}
                        </th>
                        <td>
                            {{ $guitarHardware->guitar->serial ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.guitar_production_year') }}
                        </th>
                        <td>
                            {{ $guitarHardware->guitar_production_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.country_produced') }}
                        </th>
                        <td>
                            {{ $guitarHardware->country_produced->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.body_shape') }}
                        </th>
                        <td>
                            {{ $guitarHardware->body_shape->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.top_material') }}
                        </th>
                        <td>
                            {{ $guitarHardware->top_material->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.neck_material') }}
                        </th>
                        <td>
                            {{ $guitarHardware->neck_material->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.fretboard_material') }}
                        </th>
                        <td>
                            {{ $guitarHardware->fretboard_material->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.body_finish') }}
                        </th>
                        <td>
                            {{ $guitarHardware->body_finish->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.hardware_finish') }}
                        </th>
                        <td>
                            {{ $guitarHardware->hardware_finish->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.bridge_type') }}
                        </th>
                        <td>
                            {{ $guitarHardware->bridge_type->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.pickup_number') }}
                        </th>
                        <td>
                            {{ $guitarHardware->pickup_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.pickup_configuration') }}
                        </th>
                        <td>
                            {{ $guitarHardware->pickup_configuration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.pickup_neck') }}
                        </th>
                        <td>
                            {{ $guitarHardware->pickup_neck->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.pickup_center') }}
                        </th>
                        <td>
                            {{ $guitarHardware->pickup_center->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.pickup_bridge') }}
                        </th>
                        <td>
                            {{ $guitarHardware->pickup_bridge->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.is_left_handed') }}
                        </th>
                        <td>
                            {{ $guitarHardware->is_left_handed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarHardware.fields.decription') }}
                        </th>
                        <td>
                            {{ $guitarHardware->decription }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-hardware.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
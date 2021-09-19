@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.guitarHardware.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitar-hardware.update", [$guitarHardware->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="guitar_id">{{ trans('cruds.guitarHardware.fields.guitar') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar') ? 'is-invalid' : '' }}" name="guitar_id" id="guitar_id">
                    @foreach($guitars as $id => $entry)
                        <option value="{{ $id }}" {{ (old('guitar_id') ? old('guitar_id') : $guitarHardware->guitar->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.guitar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_production_year">{{ trans('cruds.guitarHardware.fields.guitar_production_year') }}</label>
                <input class="form-control {{ $errors->has('guitar_production_year') ? 'is-invalid' : '' }}" type="number" name="guitar_production_year" id="guitar_production_year" value="{{ old('guitar_production_year', $guitarHardware->guitar_production_year) }}" step="1">
                @if($errors->has('guitar_production_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar_production_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.guitar_production_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_produced_id">{{ trans('cruds.guitarHardware.fields.country_produced') }}</label>
                <select class="form-control select2 {{ $errors->has('country_produced') ? 'is-invalid' : '' }}" name="country_produced_id" id="country_produced_id">
                    @foreach($country_produceds as $id => $entry)
                        <option value="{{ $id }}" {{ (old('country_produced_id') ? old('country_produced_id') : $guitarHardware->country_produced->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('country_produced'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country_produced') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.country_produced_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="body_shape_id">{{ trans('cruds.guitarHardware.fields.body_shape') }}</label>
                <select class="form-control select2 {{ $errors->has('body_shape') ? 'is-invalid' : '' }}" name="body_shape_id" id="body_shape_id">
                    @foreach($body_shapes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('body_shape_id') ? old('body_shape_id') : $guitarHardware->body_shape->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('body_shape'))
                    <div class="invalid-feedback">
                        {{ $errors->first('body_shape') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.body_shape_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="top_material_id">{{ trans('cruds.guitarHardware.fields.top_material') }}</label>
                <select class="form-control select2 {{ $errors->has('top_material') ? 'is-invalid' : '' }}" name="top_material_id" id="top_material_id">
                    @foreach($top_materials as $id => $entry)
                        <option value="{{ $id }}" {{ (old('top_material_id') ? old('top_material_id') : $guitarHardware->top_material->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('top_material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('top_material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.top_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="neck_material_id">{{ trans('cruds.guitarHardware.fields.neck_material') }}</label>
                <select class="form-control select2 {{ $errors->has('neck_material') ? 'is-invalid' : '' }}" name="neck_material_id" id="neck_material_id">
                    @foreach($neck_materials as $id => $entry)
                        <option value="{{ $id }}" {{ (old('neck_material_id') ? old('neck_material_id') : $guitarHardware->neck_material->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('neck_material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('neck_material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.neck_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fretboard_material_id">{{ trans('cruds.guitarHardware.fields.fretboard_material') }}</label>
                <select class="form-control select2 {{ $errors->has('fretboard_material') ? 'is-invalid' : '' }}" name="fretboard_material_id" id="fretboard_material_id">
                    @foreach($fretboard_materials as $id => $entry)
                        <option value="{{ $id }}" {{ (old('fretboard_material_id') ? old('fretboard_material_id') : $guitarHardware->fretboard_material->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('fretboard_material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fretboard_material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.fretboard_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="body_finish_id">{{ trans('cruds.guitarHardware.fields.body_finish') }}</label>
                <select class="form-control select2 {{ $errors->has('body_finish') ? 'is-invalid' : '' }}" name="body_finish_id" id="body_finish_id">
                    @foreach($body_finishes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('body_finish_id') ? old('body_finish_id') : $guitarHardware->body_finish->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('body_finish'))
                    <div class="invalid-feedback">
                        {{ $errors->first('body_finish') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.body_finish_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hardware_finish_id">{{ trans('cruds.guitarHardware.fields.hardware_finish') }}</label>
                <select class="form-control select2 {{ $errors->has('hardware_finish') ? 'is-invalid' : '' }}" name="hardware_finish_id" id="hardware_finish_id">
                    @foreach($hardware_finishes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('hardware_finish_id') ? old('hardware_finish_id') : $guitarHardware->hardware_finish->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hardware_finish'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hardware_finish') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.hardware_finish_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bridge_type_id">{{ trans('cruds.guitarHardware.fields.bridge_type') }}</label>
                <select class="form-control select2 {{ $errors->has('bridge_type') ? 'is-invalid' : '' }}" name="bridge_type_id" id="bridge_type_id">
                    @foreach($bridge_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('bridge_type_id') ? old('bridge_type_id') : $guitarHardware->bridge_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('bridge_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bridge_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.bridge_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pickup_number">{{ trans('cruds.guitarHardware.fields.pickup_number') }}</label>
                <input class="form-control {{ $errors->has('pickup_number') ? 'is-invalid' : '' }}" type="number" name="pickup_number" id="pickup_number" value="{{ old('pickup_number', $guitarHardware->pickup_number) }}" step="1">
                @if($errors->has('pickup_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pickup_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.pickup_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pickup_configuration">{{ trans('cruds.guitarHardware.fields.pickup_configuration') }}</label>
                <input class="form-control {{ $errors->has('pickup_configuration') ? 'is-invalid' : '' }}" type="text" name="pickup_configuration" id="pickup_configuration" value="{{ old('pickup_configuration', $guitarHardware->pickup_configuration) }}">
                @if($errors->has('pickup_configuration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pickup_configuration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.pickup_configuration_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pickup_neck_id">{{ trans('cruds.guitarHardware.fields.pickup_neck') }}</label>
                <select class="form-control select2 {{ $errors->has('pickup_neck') ? 'is-invalid' : '' }}" name="pickup_neck_id" id="pickup_neck_id">
                    @foreach($pickup_necks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pickup_neck_id') ? old('pickup_neck_id') : $guitarHardware->pickup_neck->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pickup_neck'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pickup_neck') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.pickup_neck_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pickup_center_id">{{ trans('cruds.guitarHardware.fields.pickup_center') }}</label>
                <select class="form-control select2 {{ $errors->has('pickup_center') ? 'is-invalid' : '' }}" name="pickup_center_id" id="pickup_center_id">
                    @foreach($pickup_centers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pickup_center_id') ? old('pickup_center_id') : $guitarHardware->pickup_center->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pickup_center'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pickup_center') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.pickup_center_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pickup_bridge_id">{{ trans('cruds.guitarHardware.fields.pickup_bridge') }}</label>
                <select class="form-control select2 {{ $errors->has('pickup_bridge') ? 'is-invalid' : '' }}" name="pickup_bridge_id" id="pickup_bridge_id">
                    @foreach($pickup_bridges as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pickup_bridge_id') ? old('pickup_bridge_id') : $guitarHardware->pickup_bridge->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pickup_bridge'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pickup_bridge') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.pickup_bridge_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="is_left_handed">{{ trans('cruds.guitarHardware.fields.is_left_handed') }}</label>
                <input class="form-control {{ $errors->has('is_left_handed') ? 'is-invalid' : '' }}" type="number" name="is_left_handed" id="is_left_handed" value="{{ old('is_left_handed', $guitarHardware->is_left_handed) }}" step="1">
                @if($errors->has('is_left_handed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_left_handed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.is_left_handed_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="decription">{{ trans('cruds.guitarHardware.fields.decription') }}</label>
                <textarea class="form-control {{ $errors->has('decription') ? 'is-invalid' : '' }}" name="decription" id="decription">{{ old('decription', $guitarHardware->decription) }}</textarea>
                @if($errors->has('decription'))
                    <div class="invalid-feedback">
                        {{ $errors->first('decription') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarHardware.fields.decription_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.guitar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitars.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="guitar_type_id">{{ trans('cruds.guitar.fields.guitar_type') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar_type') ? 'is-invalid' : '' }}" name="guitar_type_id" id="guitar_type_id">
                    @foreach($guitar_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('guitar_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.guitar_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_brand_id">{{ trans('cruds.guitar.fields.guitar_brand') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar_brand') ? 'is-invalid' : '' }}" name="guitar_brand_id" id="guitar_brand_id">
                    @foreach($guitar_brands as $id => $entry)
                        <option value="{{ $id }}" {{ old('guitar_brand_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar_brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar_brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.guitar_brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_brand_model_id">{{ trans('cruds.guitar.fields.guitar_brand_model') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar_brand_model') ? 'is-invalid' : '' }}" name="guitar_brand_model_id" id="guitar_brand_model_id">
                    @foreach($guitar_brand_models as $id => $entry)
                        <option value="{{ $id }}" {{ old('guitar_brand_model_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar_brand_model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar_brand_model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.guitar_brand_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="serial">{{ trans('cruds.guitar.fields.serial') }}</label>
                <input class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" type="text" name="serial" id="serial" value="{{ old('serial', '') }}">
                @if($errors->has('serial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('serial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.serial_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_color_id">{{ trans('cruds.guitar.fields.guitar_color') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar_color') ? 'is-invalid' : '' }}" name="guitar_color_id" id="guitar_color_id">
                    @foreach($guitar_colors as $id => $entry)
                        <option value="{{ $id }}" {{ old('guitar_color_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar_color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar_color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.guitar_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="strings_number">{{ trans('cruds.guitar.fields.strings_number') }}</label>
                <input class="form-control {{ $errors->has('strings_number') ? 'is-invalid' : '' }}" type="number" name="strings_number" id="strings_number" value="{{ old('strings_number', '') }}" step="1">
                @if($errors->has('strings_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('strings_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.strings_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certified">{{ trans('cruds.guitar.fields.certified') }}</label>
                <input class="form-control {{ $errors->has('certified') ? 'is-invalid' : '' }}" type="number" name="certified" id="certified" value="{{ old('certified', '0') }}" step="1">
                @if($errors->has('certified'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certified') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.certified_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cert_code">{{ trans('cruds.guitar.fields.cert_code') }}</label>
                <input class="form-control {{ $errors->has('cert_code') ? 'is-invalid' : '' }}" type="text" name="cert_code" id="cert_code" value="{{ old('cert_code', '') }}">
                @if($errors->has('cert_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cert_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.cert_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="to_sell">{{ trans('cruds.guitar.fields.to_sell') }}</label>
                <input class="form-control {{ $errors->has('to_sell') ? 'is-invalid' : '' }}" type="number" name="to_sell" id="to_sell" value="{{ old('to_sell', '0') }}" step="1">
                @if($errors->has('to_sell'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to_sell') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.to_sell_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="to_sell_price">{{ trans('cruds.guitar.fields.to_sell_price') }}</label>
                <input class="form-control {{ $errors->has('to_sell_price') ? 'is-invalid' : '' }}" type="number" name="to_sell_price" id="to_sell_price" value="{{ old('to_sell_price', '') }}" step="0.01">
                @if($errors->has('to_sell_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to_sell_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.to_sell_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_owner_id">{{ trans('cruds.guitar.fields.guitar_owner') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar_owner') ? 'is-invalid' : '' }}" name="guitar_owner_id" id="guitar_owner_id">
                    @foreach($guitar_owners as $id => $entry)
                        <option value="{{ $id }}" {{ old('guitar_owner_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar_owner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar_owner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.guitar_owner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image_url">{{ trans('cruds.guitar.fields.image_url') }}</label>
                <input class="form-control {{ $errors->has('image_url') ? 'is-invalid' : '' }}" type="text" name="image_url" id="image_url" value="{{ old('image_url', '') }}">
                @if($errors->has('image_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitar.fields.image_url_helper') }}</span>
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
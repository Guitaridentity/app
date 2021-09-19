@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.mother.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mothers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.mother.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_type_id">{{ trans('cruds.mother.fields.guitar_type') }}</label>
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
                <span class="help-block">{{ trans('cruds.mother.fields.guitar_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_brand_id">{{ trans('cruds.mother.fields.guitar_brand') }}</label>
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
                <span class="help-block">{{ trans('cruds.mother.fields.guitar_brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_brand_model_id">{{ trans('cruds.mother.fields.guitar_brand_model') }}</label>
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
                <span class="help-block">{{ trans('cruds.mother.fields.guitar_brand_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_color_id">{{ trans('cruds.mother.fields.guitar_color') }}</label>
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
                <span class="help-block">{{ trans('cruds.mother.fields.guitar_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="strings_number">{{ trans('cruds.mother.fields.strings_number') }}</label>
                <input class="form-control {{ $errors->has('strings_number') ? 'is-invalid' : '' }}" type="number" name="strings_number" id="strings_number" value="{{ old('strings_number', '') }}" step="1">
                @if($errors->has('strings_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('strings_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.strings_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image_url">{{ trans('cruds.mother.fields.image_url') }}</label>
                <input class="form-control {{ $errors->has('image_url') ? 'is-invalid' : '' }}" type="text" name="image_url" id="image_url" value="{{ old('image_url', '') }}">
                @if($errors->has('image_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mother.fields.image_url_helper') }}</span>
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
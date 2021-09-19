@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.guitarBrandModel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitar-brand-models.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="guitar_brand_id">{{ trans('cruds.guitarBrandModel.fields.guitar_brand') }}</label>
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
                <span class="help-block">{{ trans('cruds.guitarBrandModel.fields.guitar_brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.guitarBrandModel.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarBrandModel.fields.name_helper') }}</span>
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
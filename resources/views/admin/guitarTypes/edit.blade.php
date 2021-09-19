@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.guitarType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitar-types.update", [$guitarType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name_en">{{ trans('cruds.guitarType.fields.name_en') }}</label>
                <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', $guitarType->name_en) }}">
                @if($errors->has('name_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarType.fields.name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_it">{{ trans('cruds.guitarType.fields.name_it') }}</label>
                <input class="form-control {{ $errors->has('name_it') ? 'is-invalid' : '' }}" type="text" name="name_it" id="name_it" value="{{ old('name_it', $guitarType->name_it) }}">
                @if($errors->has('name_it'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_it') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarType.fields.name_it_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_es">{{ trans('cruds.guitarType.fields.name_es') }}</label>
                <input class="form-control {{ $errors->has('name_es') ? 'is-invalid' : '' }}" type="text" name="name_es" id="name_es" value="{{ old('name_es', $guitarType->name_es) }}">
                @if($errors->has('name_es'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_es') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarType.fields.name_es_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_ja">{{ trans('cruds.guitarType.fields.name_ja') }}</label>
                <input class="form-control {{ $errors->has('name_ja') ? 'is-invalid' : '' }}" type="text" name="name_ja" id="name_ja" value="{{ old('name_ja', $guitarType->name_ja) }}">
                @if($errors->has('name_ja'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_ja') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarType.fields.name_ja_helper') }}</span>
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
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.guitarPicture.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitar-pictures.update", [$guitarPicture->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="guitar_id">{{ trans('cruds.guitarPicture.fields.guitar') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar') ? 'is-invalid' : '' }}" name="guitar_id" id="guitar_id">
                    @foreach($guitars as $id => $entry)
                        <option value="{{ $id }}" {{ (old('guitar_id') ? old('guitar_id') : $guitarPicture->guitar->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPicture.fields.guitar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.guitarPicture.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', $guitarPicture->url) }}">
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPicture.fields.url_helper') }}</span>
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
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.guitarvideo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitarvideos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="guitar_id">{{ trans('cruds.guitarvideo.fields.guitar') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar') ? 'is-invalid' : '' }}" name="guitar_id" id="guitar_id">
                    @foreach($guitars as $id => $entry)
                        <option value="{{ $id }}" {{ old('guitar_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarvideo.fields.guitar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.guitarvideo.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}">
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarvideo.fields.url_helper') }}</span>
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
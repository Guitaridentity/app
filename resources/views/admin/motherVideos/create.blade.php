@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.motherVideo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mother-videos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="mother_id">{{ trans('cruds.motherVideo.fields.mother') }}</label>
                <select class="form-control select2 {{ $errors->has('mother') ? 'is-invalid' : '' }}" name="mother_id" id="mother_id">
                    @foreach($mothers as $id => $entry)
                        <option value="{{ $id }}" {{ old('mother_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('mother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.motherVideo.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.motherVideo.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}">
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.motherVideo.fields.url_helper') }}</span>
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
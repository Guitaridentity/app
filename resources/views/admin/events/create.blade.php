@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.events.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="author_id">{{ trans('cruds.event.fields.author') }}</label>
                <select class="form-control select2 {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author_id" id="author_id">
                    @foreach($authors as $id => $entry)
                        <option value="{{ $id }}" {{ old('author_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('author') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.author_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.event.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.event.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.event.fields.start') }}</label>
                <input class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start') }}">
                @if($errors->has('start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hours_endurance">{{ trans('cruds.event.fields.hours_endurance') }}</label>
                <input class="form-control {{ $errors->has('hours_endurance') ? 'is-invalid' : '' }}" type="number" name="hours_endurance" id="hours_endurance" value="{{ old('hours_endurance', '0') }}" step="1">
                @if($errors->has('hours_endurance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hours_endurance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.hours_endurance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_vod">{{ trans('cruds.event.fields.price_vod') }}</label>
                <input class="form-control {{ $errors->has('price_vod') ? 'is-invalid' : '' }}" type="number" name="price_vod" id="price_vod" value="{{ old('price_vod', '') }}" step="0.01">
                @if($errors->has('price_vod'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_vod') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.price_vod_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_live">{{ trans('cruds.event.fields.price_live') }}</label>
                <input class="form-control {{ $errors->has('price_live') ? 'is-invalid' : '' }}" type="number" name="price_live" id="price_live" value="{{ old('price_live', '') }}" step="0.01">
                @if($errors->has('price_live'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_live') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.price_live_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link_live">{{ trans('cruds.event.fields.link_live') }}</label>
                <input class="form-control {{ $errors->has('link_live') ? 'is-invalid' : '' }}" type="text" name="link_live" id="link_live" value="{{ old('link_live', '') }}">
                @if($errors->has('link_live'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link_live') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.link_live_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link_vod">{{ trans('cruds.event.fields.link_vod') }}</label>
                <input class="form-control {{ $errors->has('link_vod') ? 'is-invalid' : '' }}" type="text" name="link_vod" id="link_vod" value="{{ old('link_vod', '') }}">
                @if($errors->has('link_vod'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link_vod') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.link_vod_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="percent_to_author">{{ trans('cruds.event.fields.percent_to_author') }}</label>
                <input class="form-control {{ $errors->has('percent_to_author') ? 'is-invalid' : '' }}" type="number" name="percent_to_author" id="percent_to_author" value="{{ old('percent_to_author', '') }}" step="1">
                @if($errors->has('percent_to_author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('percent_to_author') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.percent_to_author_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover_img">{{ trans('cruds.event.fields.cover_img') }}</label>
                <input class="form-control {{ $errors->has('cover_img') ? 'is-invalid' : '' }}" type="text" name="cover_img" id="cover_img" value="{{ old('cover_img', '') }}">
                @if($errors->has('cover_img'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cover_img') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.cover_img_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cover_video">{{ trans('cruds.event.fields.cover_video') }}</label>
                <input class="form-control {{ $errors->has('cover_video') ? 'is-invalid' : '' }}" type="text" name="cover_video" id="cover_video" value="{{ old('cover_video', '') }}">
                @if($errors->has('cover_video'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cover_video') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.cover_video_helper') }}</span>
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
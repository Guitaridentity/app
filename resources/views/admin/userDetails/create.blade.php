@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.userDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-details.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="text">{{ trans('cruds.userDetail.fields.text') }}</label>
                <textarea class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" name="text" id="text">{{ old('text') }}</textarea>
                @if($errors->has('text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="www">{{ trans('cruds.userDetail.fields.www') }}</label>
                <input class="form-control {{ $errors->has('www') ? 'is-invalid' : '' }}" type="text" name="www" id="www" value="{{ old('www', '') }}">
                @if($errors->has('www'))
                    <div class="invalid-feedback">
                        {{ $errors->first('www') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.www_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.userDetail.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.userDetail.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.userDetail.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.userDetail.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', '') }}">
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tiktok">{{ trans('cruds.userDetail.fields.tiktok') }}</label>
                <input class="form-control {{ $errors->has('tiktok') ? 'is-invalid' : '' }}" type="text" name="tiktok" id="tiktok" value="{{ old('tiktok', '') }}">
                @if($errors->has('tiktok'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tiktok') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.tiktok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="soundcloud">{{ trans('cruds.userDetail.fields.soundcloud') }}</label>
                <input class="form-control {{ $errors->has('soundcloud') ? 'is-invalid' : '' }}" type="text" name="soundcloud" id="soundcloud" value="{{ old('soundcloud', '') }}">
                @if($errors->has('soundcloud'))
                    <div class="invalid-feedback">
                        {{ $errors->first('soundcloud') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.soundcloud_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="drooble">{{ trans('cruds.userDetail.fields.drooble') }}</label>
                <input class="form-control {{ $errors->has('drooble') ? 'is-invalid' : '' }}" type="text" name="drooble" id="drooble" value="{{ old('drooble', '') }}">
                @if($errors->has('drooble'))
                    <div class="invalid-feedback">
                        {{ $errors->first('drooble') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.drooble_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.userDetail.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', '') }}">
                @if($errors->has('linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.linkedin_helper') }}</span>
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
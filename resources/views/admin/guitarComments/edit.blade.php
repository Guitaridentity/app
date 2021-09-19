@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.guitarComment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitar-comments.update", [$guitarComment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="guitar_id">{{ trans('cruds.guitarComment.fields.guitar') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar') ? 'is-invalid' : '' }}" name="guitar_id" id="guitar_id">
                    @foreach($guitars as $id => $entry)
                        <option value="{{ $id }}" {{ (old('guitar_id') ? old('guitar_id') : $guitarComment->guitar->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarComment.fields.guitar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.guitarComment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $guitarComment->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarComment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.guitarComment.fields.comment') }}</label>
                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{{ old('comment', $guitarComment->comment) }}</textarea>
                @if($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarComment.fields.comment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="signaled">{{ trans('cruds.guitarComment.fields.signaled') }}</label>
                <input class="form-control {{ $errors->has('signaled') ? 'is-invalid' : '' }}" type="number" name="signaled" id="signaled" value="{{ old('signaled', $guitarComment->signaled) }}" step="1">
                @if($errors->has('signaled'))
                    <div class="invalid-feedback">
                        {{ $errors->first('signaled') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarComment.fields.signaled_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disabled">{{ trans('cruds.guitarComment.fields.disabled') }}</label>
                <input class="form-control {{ $errors->has('disabled') ? 'is-invalid' : '' }}" type="number" name="disabled" id="disabled" value="{{ old('disabled', $guitarComment->disabled) }}" step="1">
                @if($errors->has('disabled'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disabled') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarComment.fields.disabled_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="likes">{{ trans('cruds.guitarComment.fields.likes') }}</label>
                <input class="form-control {{ $errors->has('likes') ? 'is-invalid' : '' }}" type="number" name="likes" id="likes" value="{{ old('likes', $guitarComment->likes) }}" step="1">
                @if($errors->has('likes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('likes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarComment.fields.likes_helper') }}</span>
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
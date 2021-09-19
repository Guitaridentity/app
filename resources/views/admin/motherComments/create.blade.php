@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.motherComment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mother-comments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="mother_id">{{ trans('cruds.motherComment.fields.mother') }}</label>
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
                <span class="help-block">{{ trans('cruds.motherComment.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.motherComment.fields.comment') }}</label>
                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{{ old('comment') }}</textarea>
                @if($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.motherComment.fields.comment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="signaled">{{ trans('cruds.motherComment.fields.signaled') }}</label>
                <input class="form-control {{ $errors->has('signaled') ? 'is-invalid' : '' }}" type="number" name="signaled" id="signaled" value="{{ old('signaled', '0') }}" step="1">
                @if($errors->has('signaled'))
                    <div class="invalid-feedback">
                        {{ $errors->first('signaled') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.motherComment.fields.signaled_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disabled">{{ trans('cruds.motherComment.fields.disabled') }}</label>
                <input class="form-control {{ $errors->has('disabled') ? 'is-invalid' : '' }}" type="number" name="disabled" id="disabled" value="{{ old('disabled', '0') }}" step="1">
                @if($errors->has('disabled'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disabled') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.motherComment.fields.disabled_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="likes">{{ trans('cruds.motherComment.fields.likes') }}</label>
                <input class="form-control {{ $errors->has('likes') ? 'is-invalid' : '' }}" type="number" name="likes" id="likes" value="{{ old('likes', '') }}" step="1">
                @if($errors->has('likes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('likes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.motherComment.fields.likes_helper') }}</span>
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
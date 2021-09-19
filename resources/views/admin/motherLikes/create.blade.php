@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.motherLike.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mother-likes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="mother_id">{{ trans('cruds.motherLike.fields.mother') }}</label>
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
                <span class="help-block">{{ trans('cruds.motherLike.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.motherLike.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.motherLike.fields.user_helper') }}</span>
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
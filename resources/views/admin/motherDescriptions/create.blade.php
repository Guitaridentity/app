@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.motherDescription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mother-descriptions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="mother_id">{{ trans('cruds.motherDescription.fields.mother') }}</label>
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
                <span class="help-block">{{ trans('cruds.motherDescription.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.motherDescription.fields.user') }}</label>
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
                <span class="help-block">{{ trans('cruds.motherDescription.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.motherDescription.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.motherDescription.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approved">{{ trans('cruds.motherDescription.fields.approved') }}</label>
                <input class="form-control {{ $errors->has('approved') ? 'is-invalid' : '' }}" type="number" name="approved" id="approved" value="{{ old('approved', '0') }}" step="1">
                @if($errors->has('approved'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.motherDescription.fields.approved_helper') }}</span>
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
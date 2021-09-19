@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.guitarchange.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitarchanges.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="guitar_owner_id">{{ trans('cruds.guitarchange.fields.guitar_owner') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar_owner') ? 'is-invalid' : '' }}" name="guitar_owner_id" id="guitar_owner_id">
                    @foreach($guitar_owners as $id => $entry)
                        <option value="{{ $id }}" {{ old('guitar_owner_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar_owner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar_owner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarchange.fields.guitar_owner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.guitarchange.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarchange.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_change">{{ trans('cruds.guitarchange.fields.date_change') }}</label>
                <input class="form-control date {{ $errors->has('date_change') ? 'is-invalid' : '' }}" type="text" name="date_change" id="date_change" value="{{ old('date_change') }}">
                @if($errors->has('date_change'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_change') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarchange.fields.date_change_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="done_by">{{ trans('cruds.guitarchange.fields.done_by') }}</label>
                <input class="form-control {{ $errors->has('done_by') ? 'is-invalid' : '' }}" type="text" name="done_by" id="done_by" value="{{ old('done_by', '') }}">
                @if($errors->has('done_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('done_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarchange.fields.done_by_helper') }}</span>
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
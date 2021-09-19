@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.guitarowner.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitarowners.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="hix">{{ trans('cruds.guitarowner.fields.hix') }}</label>
                <input class="form-control {{ $errors->has('hix') ? 'is-invalid' : '' }}" type="number" name="hix" id="hix" value="{{ old('hix', '0') }}" step="1">
                @if($errors->has('hix'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hix') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarowner.fields.hix_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.guitarowner.fields.user') }}</label>
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
                <span class="help-block">{{ trans('cruds.guitarowner.fields.user_helper') }}</span>
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
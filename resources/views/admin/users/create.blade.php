@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.user.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile_prefix">{{ trans('cruds.user.fields.mobile_prefix') }}</label>
                <input class="form-control {{ $errors->has('mobile_prefix') ? 'is-invalid' : '' }}" type="text" name="mobile_prefix" id="mobile_prefix" value="{{ old('mobile_prefix', '') }}">
                @if($errors->has('mobile_prefix'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_prefix') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.mobile_prefix_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile_number">{{ trans('cruds.user.fields.mobile_number') }}</label>
                <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}" type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', '') }}">
                @if($errors->has('mobile_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.mobile_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="language">{{ trans('cruds.user.fields.language') }}</label>
                <input class="form-control {{ $errors->has('language') ? 'is-invalid' : '' }}" type="text" name="language" id="language" value="{{ old('language', 'en') }}">
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.language_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_birth">{{ trans('cruds.user.fields.date_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_birth') ? 'is-invalid' : '' }}" type="text" name="date_birth" id="date_birth" value="{{ old('date_birth') }}">
                @if($errors->has('date_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.date_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_profession_id">{{ trans('cruds.user.fields.user_profession') }}</label>
                <select class="form-control select2 {{ $errors->has('user_profession') ? 'is-invalid' : '' }}" name="user_profession_id" id="user_profession_id">
                    @foreach($user_professions as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_profession_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.user_profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="avatar">{{ trans('cruds.user.fields.avatar') }}</label>
                <input class="form-control {{ $errors->has('avatar') ? 'is-invalid' : '' }}" type="text" name="avatar" id="avatar" value="{{ old('avatar', '') }}">
                @if($errors->has('avatar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('avatar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.avatar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disabled">{{ trans('cruds.user.fields.disabled') }}</label>
                <input class="form-control {{ $errors->has('disabled') ? 'is-invalid' : '' }}" type="number" name="disabled" id="disabled" value="{{ old('disabled', '0') }}" step="1">
                @if($errors->has('disabled'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disabled') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.disabled_helper') }}</span>
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
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.eventUser.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.event-users.update", [$eventUser->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="event_id">{{ trans('cruds.eventUser.fields.event') }}</label>
                <select class="form-control select2 {{ $errors->has('event') ? 'is-invalid' : '' }}" name="event_id" id="event_id">
                    @foreach($events as $id => $entry)
                        <option value="{{ $id }}" {{ (old('event_id') ? old('event_id') : $eventUser->event->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('event'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventUser.fields.event_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user">{{ trans('cruds.eventUser.fields.user') }}</label>
                <input class="form-control {{ $errors->has('user') ? 'is-invalid' : '' }}" type="text" name="user" id="user" value="{{ old('user', $eventUser->user) }}">
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventUser.fields.user_helper') }}</span>
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
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.plan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.plans.update", [$plan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.plan.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $plan->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.plan.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $plan->price) }}" step="0.01">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certification">{{ trans('cruds.plan.fields.certification') }}</label>
                <input class="form-control {{ $errors->has('certification') ? 'is-invalid' : '' }}" type="number" name="certification" id="certification" value="{{ old('certification', $plan->certification) }}" step="1">
                @if($errors->has('certification'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certification') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.certification_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="picture">{{ trans('cruds.plan.fields.picture') }}</label>
                <input class="form-control {{ $errors->has('picture') ? 'is-invalid' : '' }}" type="number" name="picture" id="picture" value="{{ old('picture', $plan->picture) }}" step="1">
                @if($errors->has('picture'))
                    <div class="invalid-feedback">
                        {{ $errors->first('picture') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.picture_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video">{{ trans('cruds.plan.fields.video') }}</label>
                <input class="form-control {{ $errors->has('video') ? 'is-invalid' : '' }}" type="text" name="video" id="video" value="{{ old('video', $plan->video) }}">
                @if($errors->has('video'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.video_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="events">{{ trans('cruds.plan.fields.events') }}</label>
                <input class="form-control {{ $errors->has('events') ? 'is-invalid' : '' }}" type="number" name="events" id="events" value="{{ old('events', $plan->events) }}" step="1">
                @if($errors->has('events'))
                    <div class="invalid-feedback">
                        {{ $errors->first('events') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.events_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="courses">{{ trans('cruds.plan.fields.courses') }}</label>
                <input class="form-control {{ $errors->has('courses') ? 'is-invalid' : '' }}" type="text" name="courses" id="courses" value="{{ old('courses', $plan->courses) }}">
                @if($errors->has('courses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('courses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.courses_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="month">{{ trans('cruds.plan.fields.month') }}</label>
                <input class="form-control {{ $errors->has('month') ? 'is-invalid' : '' }}" type="number" name="month" id="month" value="{{ old('month', $plan->month) }}" step="1">
                @if($errors->has('month'))
                    <div class="invalid-feedback">
                        {{ $errors->first('month') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.month_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="roles">{{ trans('cruds.plan.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $plan->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.roles_helper') }}</span>
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
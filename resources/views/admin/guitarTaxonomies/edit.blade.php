@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.guitarTaxonomy.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitar-taxonomies.update", [$guitarTaxonomy->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="taxonomy_id">{{ trans('cruds.guitarTaxonomy.fields.taxonomy') }}</label>
                <select class="form-control select2 {{ $errors->has('taxonomy') ? 'is-invalid' : '' }}" name="taxonomy_id" id="taxonomy_id">
                    @foreach($taxonomies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('taxonomy_id') ? old('taxonomy_id') : $guitarTaxonomy->taxonomy->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('taxonomy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('taxonomy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarTaxonomy.fields.taxonomy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="value">{{ trans('cruds.guitarTaxonomy.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', $guitarTaxonomy->value) }}">
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarTaxonomy.fields.value_helper') }}</span>
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
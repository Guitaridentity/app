@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.guitarPurchaseWhere.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitar-purchase-wheres.update", [$guitarPurchaseWhere->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="town">{{ trans('cruds.guitarPurchaseWhere.fields.town') }}</label>
                <input class="form-control {{ $errors->has('town') ? 'is-invalid' : '' }}" type="text" name="town" id="town" value="{{ old('town', $guitarPurchaseWhere->town) }}">
                @if($errors->has('town'))
                    <div class="invalid-feedback">
                        {{ $errors->first('town') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchaseWhere.fields.town_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="province">{{ trans('cruds.guitarPurchaseWhere.fields.province') }}</label>
                <input class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" type="text" name="province" id="province" value="{{ old('province', $guitarPurchaseWhere->province) }}">
                @if($errors->has('province'))
                    <div class="invalid-feedback">
                        {{ $errors->first('province') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchaseWhere.fields.province_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.guitarPurchaseWhere.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', $guitarPurchaseWhere->state) }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchaseWhere.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.guitarPurchaseWhere.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', $guitarPurchaseWhere->country) }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchaseWhere.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.guitarPurchaseWhere.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', $guitarPurchaseWhere->zip) }}">
                @if($errors->has('zip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchaseWhere.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.guitarPurchaseWhere.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="number" name="latitude" id="latitude" value="{{ old('latitude', $guitarPurchaseWhere->latitude) }}" step="0.000001">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchaseWhere.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.guitarPurchaseWhere.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="number" name="longitude" id="longitude" value="{{ old('longitude', $guitarPurchaseWhere->longitude) }}" step="0.000001">
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchaseWhere.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guitar_purchase_id">{{ trans('cruds.guitarPurchaseWhere.fields.guitar_purchase') }}</label>
                <select class="form-control select2 {{ $errors->has('guitar_purchase') ? 'is-invalid' : '' }}" name="guitar_purchase_id" id="guitar_purchase_id">
                    @foreach($guitar_purchases as $id => $entry)
                        <option value="{{ $id }}" {{ (old('guitar_purchase_id') ? old('guitar_purchase_id') : $guitarPurchaseWhere->guitar_purchase->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('guitar_purchase'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guitar_purchase') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchaseWhere.fields.guitar_purchase_helper') }}</span>
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
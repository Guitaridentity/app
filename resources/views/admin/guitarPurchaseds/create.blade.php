@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.guitarPurchased.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guitar-purchaseds.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="owner_id">{{ trans('cruds.guitarPurchased.fields.owner') }}</label>
                <select class="form-control select2 {{ $errors->has('owner') ? 'is-invalid' : '' }}" name="owner_id" id="owner_id">
                    @foreach($owners as $id => $entry)
                        <option value="{{ $id }}" {{ old('owner_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('owner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('owner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchased.fields.owner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchased_date">{{ trans('cruds.guitarPurchased.fields.purchased_date') }}</label>
                <input class="form-control date {{ $errors->has('purchased_date') ? 'is-invalid' : '' }}" type="text" name="purchased_date" id="purchased_date" value="{{ old('purchased_date') }}">
                @if($errors->has('purchased_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchased_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchased.fields.purchased_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchase_price_currency">{{ trans('cruds.guitarPurchased.fields.purchase_price_currency') }}</label>
                <input class="form-control {{ $errors->has('purchase_price_currency') ? 'is-invalid' : '' }}" type="text" name="purchase_price_currency" id="purchase_price_currency" value="{{ old('purchase_price_currency', '') }}">
                @if($errors->has('purchase_price_currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_price_currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchased.fields.purchase_price_currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchase_price_amount">{{ trans('cruds.guitarPurchased.fields.purchase_price_amount') }}</label>
                <input class="form-control {{ $errors->has('purchase_price_amount') ? 'is-invalid' : '' }}" type="number" name="purchase_price_amount" id="purchase_price_amount" value="{{ old('purchase_price_amount', '') }}" step="0.01">
                @if($errors->has('purchase_price_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_price_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchased.fields.purchase_price_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchased_who">{{ trans('cruds.guitarPurchased.fields.purchased_who') }}</label>
                <input class="form-control {{ $errors->has('purchased_who') ? 'is-invalid' : '' }}" type="text" name="purchased_who" id="purchased_who" value="{{ old('purchased_who', '') }}">
                @if($errors->has('purchased_who'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchased_who') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guitarPurchased.fields.purchased_who_helper') }}</span>
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
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarPurchased.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-purchaseds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchased.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarPurchased->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchased.fields.owner') }}
                        </th>
                        <td>
                            {{ $guitarPurchased->owner->hix ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchased.fields.purchased_date') }}
                        </th>
                        <td>
                            {{ $guitarPurchased->purchased_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchased.fields.purchase_price_currency') }}
                        </th>
                        <td>
                            {{ $guitarPurchased->purchase_price_currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchased.fields.purchase_price_amount') }}
                        </th>
                        <td>
                            {{ $guitarPurchased->purchase_price_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchased.fields.purchased_who') }}
                        </th>
                        <td>
                            {{ $guitarPurchased->purchased_who }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-purchaseds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
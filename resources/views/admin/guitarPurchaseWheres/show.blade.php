@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarPurchaseWhere.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-purchase-wheres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchaseWhere.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarPurchaseWhere->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchaseWhere.fields.town') }}
                        </th>
                        <td>
                            {{ $guitarPurchaseWhere->town }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchaseWhere.fields.province') }}
                        </th>
                        <td>
                            {{ $guitarPurchaseWhere->province }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchaseWhere.fields.state') }}
                        </th>
                        <td>
                            {{ $guitarPurchaseWhere->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchaseWhere.fields.country') }}
                        </th>
                        <td>
                            {{ $guitarPurchaseWhere->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchaseWhere.fields.zip') }}
                        </th>
                        <td>
                            {{ $guitarPurchaseWhere->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchaseWhere.fields.latitude') }}
                        </th>
                        <td>
                            {{ $guitarPurchaseWhere->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchaseWhere.fields.longitude') }}
                        </th>
                        <td>
                            {{ $guitarPurchaseWhere->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarPurchaseWhere.fields.guitar_purchase') }}
                        </th>
                        <td>
                            {{ $guitarPurchaseWhere->guitar_purchase->purchased_who ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-purchase-wheres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.id') }}
                        </th>
                        <td>
                            {{ $guitar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.guitar_type') }}
                        </th>
                        <td>
                            {{ $guitar->guitar_type->name_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.guitar_brand') }}
                        </th>
                        <td>
                            {{ $guitar->guitar_brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.guitar_brand_model') }}
                        </th>
                        <td>
                            {{ $guitar->guitar_brand_model->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.serial') }}
                        </th>
                        <td>
                            {{ $guitar->serial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.guitar_color') }}
                        </th>
                        <td>
                            {{ $guitar->guitar_color->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.strings_number') }}
                        </th>
                        <td>
                            {{ $guitar->strings_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.certified') }}
                        </th>
                        <td>
                            {{ $guitar->certified }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.cert_code') }}
                        </th>
                        <td>
                            {{ $guitar->cert_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.to_sell') }}
                        </th>
                        <td>
                            {{ $guitar->to_sell }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.to_sell_price') }}
                        </th>
                        <td>
                            {{ $guitar->to_sell_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.guitar_owner') }}
                        </th>
                        <td>
                            {{ $guitar->guitar_owner->hix ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitar.fields.image_url') }}
                        </th>
                        <td>
                            {{ $guitar->image_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#guitar_guitar_hardware" role="tab" data-toggle="tab">
                {{ trans('cruds.guitarHardware.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#guitar_guitar_comments" role="tab" data-toggle="tab">
                {{ trans('cruds.guitarComment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="guitar_guitar_hardware">
            @includeIf('admin.guitars.relationships.guitarGuitarHardware', ['guitarHardware' => $guitar->guitarGuitarHardware])
        </div>
        <div class="tab-pane" role="tabpanel" id="guitar_guitar_comments">
            @includeIf('admin.guitars.relationships.guitarGuitarComments', ['guitarComments' => $guitar->guitarGuitarComments])
        </div>
    </div>
</div>

@endsection
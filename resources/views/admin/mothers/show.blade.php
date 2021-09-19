@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mother.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mothers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.id') }}
                        </th>
                        <td>
                            {{ $mother->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.title') }}
                        </th>
                        <td>
                            {{ $mother->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.guitar_type') }}
                        </th>
                        <td>
                            {{ $mother->guitar_type->name_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.guitar_brand') }}
                        </th>
                        <td>
                            {{ $mother->guitar_brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.guitar_brand_model') }}
                        </th>
                        <td>
                            {{ $mother->guitar_brand_model->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.guitar_color') }}
                        </th>
                        <td>
                            {{ $mother->guitar_color->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.strings_number') }}
                        </th>
                        <td>
                            {{ $mother->strings_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mother.fields.image_url') }}
                        </th>
                        <td>
                            {{ $mother->image_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mothers.index') }}">
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
            <a class="nav-link" href="#mother_mother_hardware" role="tab" data-toggle="tab">
                {{ trans('cruds.motherHardware.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#mother_mother_comments" role="tab" data-toggle="tab">
                {{ trans('cruds.motherComment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="mother_mother_hardware">
            @includeIf('admin.mothers.relationships.motherMotherHardware', ['motherHardware' => $mother->motherMotherHardware])
        </div>
        <div class="tab-pane" role="tabpanel" id="mother_mother_comments">
            @includeIf('admin.mothers.relationships.motherMotherComments', ['motherComments' => $mother->motherMotherComments])
        </div>
    </div>
</div>

@endsection
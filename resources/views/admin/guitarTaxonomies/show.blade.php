@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guitarTaxonomy.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-taxonomies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarTaxonomy.fields.id') }}
                        </th>
                        <td>
                            {{ $guitarTaxonomy->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarTaxonomy.fields.taxonomy') }}
                        </th>
                        <td>
                            {{ $guitarTaxonomy->taxonomy->name_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guitarTaxonomy.fields.value') }}
                        </th>
                        <td>
                            {{ $guitarTaxonomy->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.guitar-taxonomies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
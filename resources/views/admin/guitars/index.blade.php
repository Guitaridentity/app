@extends('layouts.admin')
@section('content')
@can('guitar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.guitars.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.guitar.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.guitar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Guitar">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.guitar_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.guitar_brand') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.guitar_brand_model') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.serial') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.guitar_color') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.strings_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.certified') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.cert_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.to_sell') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.to_sell_price') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.guitar_owner') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitar.fields.image_url') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('guitar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.guitars.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.guitars.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'guitar_type_name_en', name: 'guitar_type.name_en' },
{ data: 'guitar_brand_name', name: 'guitar_brand.name' },
{ data: 'guitar_brand_model_name', name: 'guitar_brand_model.name' },
{ data: 'serial', name: 'serial' },
{ data: 'guitar_color_value', name: 'guitar_color.value' },
{ data: 'strings_number', name: 'strings_number' },
{ data: 'certified', name: 'certified' },
{ data: 'cert_code', name: 'cert_code' },
{ data: 'to_sell', name: 'to_sell' },
{ data: 'to_sell_price', name: 'to_sell_price' },
{ data: 'guitar_owner_hix', name: 'guitar_owner.hix' },
{ data: 'image_url', name: 'image_url' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Guitar').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection
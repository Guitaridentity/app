@extends('layouts.admin')
@section('content')
@can('guitar_hardware_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.guitar-hardware.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.guitarHardware.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.guitarHardware.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-GuitarHardware">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.guitar') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.guitar_production_year') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.country_produced') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.body_shape') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.top_material') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.neck_material') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.fretboard_material') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.body_finish') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.hardware_finish') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.bridge_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.pickup_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.pickup_configuration') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.pickup_neck') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.pickup_center') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.pickup_bridge') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.is_left_handed') }}
                    </th>
                    <th>
                        {{ trans('cruds.guitarHardware.fields.decription') }}
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
@can('guitar_hardware_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.guitar-hardware.massDestroy') }}",
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
    ajax: "{{ route('admin.guitar-hardware.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'guitar_serial', name: 'guitar.serial' },
{ data: 'guitar_production_year', name: 'guitar_production_year' },
{ data: 'country_produced_name', name: 'country_produced.name' },
{ data: 'body_shape_value', name: 'body_shape.value' },
{ data: 'top_material_value', name: 'top_material.value' },
{ data: 'neck_material_value', name: 'neck_material.value' },
{ data: 'fretboard_material_value', name: 'fretboard_material.value' },
{ data: 'body_finish_value', name: 'body_finish.value' },
{ data: 'hardware_finish_value', name: 'hardware_finish.value' },
{ data: 'bridge_type_value', name: 'bridge_type.value' },
{ data: 'pickup_number', name: 'pickup_number' },
{ data: 'pickup_configuration', name: 'pickup_configuration' },
{ data: 'pickup_neck_value', name: 'pickup_neck.value' },
{ data: 'pickup_center_value', name: 'pickup_center.value' },
{ data: 'pickup_bridge_value', name: 'pickup_bridge.value' },
{ data: 'is_left_handed', name: 'is_left_handed' },
{ data: 'decription', name: 'decription' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-GuitarHardware').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection
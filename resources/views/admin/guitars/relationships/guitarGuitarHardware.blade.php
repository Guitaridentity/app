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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-guitarGuitarHardware">
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
                <tbody>
                    @foreach($guitarHardware as $key => $guitarHardware)
                        <tr data-entry-id="{{ $guitarHardware->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $guitarHardware->id ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->guitar->serial ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->guitar_production_year ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->country_produced->name ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->body_shape->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->top_material->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->neck_material->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->fretboard_material->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->body_finish->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->hardware_finish->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->bridge_type->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->pickup_number ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->pickup_configuration ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->pickup_neck->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->pickup_center->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->pickup_bridge->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->is_left_handed ?? '' }}
                            </td>
                            <td>
                                {{ $guitarHardware->decription ?? '' }}
                            </td>
                            <td>
                                @can('guitar_hardware_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.guitar-hardware.show', $guitarHardware->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('guitar_hardware_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.guitar-hardware.edit', $guitarHardware->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('guitar_hardware_delete')
                                    <form action="{{ route('admin.guitar-hardware.destroy', $guitarHardware->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('guitar_hardware_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.guitar-hardware.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-guitarGuitarHardware:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
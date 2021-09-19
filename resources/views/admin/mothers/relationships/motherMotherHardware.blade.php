@can('mother_hardware_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mother-hardware.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.motherHardware.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.motherHardware.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-motherMotherHardware">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.mother') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.guitar_production_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.country_produced') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.body_shape') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.top_material') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.neck_material') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.fretboard_material') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.body_finish') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.hardware_finish') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.bridge_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_configuration') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_neck') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_center') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.pickup_bridge') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.is_left_handed') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherHardware.fields.decription') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motherHardware as $key => $motherHardware)
                        <tr data-entry-id="{{ $motherHardware->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $motherHardware->id ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->mother->title ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->guitar_production_year ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->country_produced->name ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->body_shape->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->top_material->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->neck_material->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->fretboard_material->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->body_finish->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->hardware_finish->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->bridge_type->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->pickup_number ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->pickup_configuration ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->pickup_neck->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->pickup_center->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->pickup_bridge->value ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->is_left_handed ?? '' }}
                            </td>
                            <td>
                                {{ $motherHardware->decription ?? '' }}
                            </td>
                            <td>
                                @can('mother_hardware_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mother-hardware.show', $motherHardware->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mother_hardware_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mother-hardware.edit', $motherHardware->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mother_hardware_delete')
                                    <form action="{{ route('admin.mother-hardware.destroy', $motherHardware->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mother_hardware_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mother-hardware.massDestroy') }}",
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
  let table = $('.datatable-motherMotherHardware:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
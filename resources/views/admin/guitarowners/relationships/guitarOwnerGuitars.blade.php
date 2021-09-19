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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-guitarOwnerGuitars">
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
                <tbody>
                    @foreach($guitars as $key => $guitar)
                        <tr data-entry-id="{{ $guitar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $guitar->id ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->guitar_type->name_en ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->guitar_brand->name ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->guitar_brand_model->name ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->serial ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->guitar_color->value ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->strings_number ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->certified ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->cert_code ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->to_sell ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->to_sell_price ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->guitar_owner->hix ?? '' }}
                            </td>
                            <td>
                                {{ $guitar->image_url ?? '' }}
                            </td>
                            <td>
                                @can('guitar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.guitars.show', $guitar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('guitar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.guitars.edit', $guitar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('guitar_delete')
                                    <form action="{{ route('admin.guitars.destroy', $guitar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('guitar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.guitars.massDestroy') }}",
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
  let table = $('.datatable-guitarOwnerGuitars:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@extends('layouts.admin')
@section('content')
@can('user_address_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.user-addresses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.userAddress.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.userAddress.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-UserAddress">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.userAddress.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.userAddress.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.userAddress.fields.town') }}
                    </th>
                    <th>
                        {{ trans('cruds.userAddress.fields.province') }}
                    </th>
                    <th>
                        {{ trans('cruds.userAddress.fields.state') }}
                    </th>
                    <th>
                        {{ trans('cruds.userAddress.fields.country') }}
                    </th>
                    <th>
                        {{ trans('cruds.userAddress.fields.zip') }}
                    </th>
                    <th>
                        {{ trans('cruds.userAddress.fields.latitude') }}
                    </th>
                    <th>
                        {{ trans('cruds.userAddress.fields.longitude') }}
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
@can('user_address_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.user-addresses.massDestroy') }}",
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
    ajax: "{{ route('admin.user-addresses.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'user_email', name: 'user.email' },
{ data: 'town', name: 'town' },
{ data: 'province', name: 'province' },
{ data: 'state', name: 'state' },
{ data: 'country', name: 'country' },
{ data: 'zip', name: 'zip' },
{ data: 'latitude', name: 'latitude' },
{ data: 'longitude', name: 'longitude' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-UserAddress').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection
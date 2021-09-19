@extends('layouts.admin')
@section('content')
@can('plan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.plans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.plan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.plan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Plan">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.certification') }}
                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.picture') }}
                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.video') }}
                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.events') }}
                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.courses') }}
                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.month') }}
                    </th>
                    <th>
                        {{ trans('cruds.plan.fields.roles') }}
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
@can('plan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.plans.massDestroy') }}",
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
    ajax: "{{ route('admin.plans.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'price', name: 'price' },
{ data: 'certification', name: 'certification' },
{ data: 'picture', name: 'picture' },
{ data: 'video', name: 'video' },
{ data: 'events', name: 'events' },
{ data: 'courses', name: 'courses' },
{ data: 'month', name: 'month' },
{ data: 'roles', name: 'roles.title' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Plan').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection
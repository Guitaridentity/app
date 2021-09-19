@extends('layouts.admin')
@section('content')
@can('event_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.events.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.event.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.event.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Event">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.event.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.author') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.start') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.hours_endurance') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.price_vod') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.price_live') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.link_live') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.link_vod') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.percent_to_author') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.cover_img') }}
                    </th>
                    <th>
                        {{ trans('cruds.event.fields.cover_video') }}
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
@can('event_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.events.massDestroy') }}",
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
    ajax: "{{ route('admin.events.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'author_name', name: 'author.name' },
{ data: 'title', name: 'title' },
{ data: 'description', name: 'description' },
{ data: 'start', name: 'start' },
{ data: 'hours_endurance', name: 'hours_endurance' },
{ data: 'price_vod', name: 'price_vod' },
{ data: 'price_live', name: 'price_live' },
{ data: 'link_live', name: 'link_live' },
{ data: 'link_vod', name: 'link_vod' },
{ data: 'percent_to_author', name: 'percent_to_author' },
{ data: 'cover_img', name: 'cover_img' },
{ data: 'cover_video', name: 'cover_video' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Event').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection
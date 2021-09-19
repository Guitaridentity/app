@extends('layouts.admin')
@section('content')
@can('guitar_like_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.guitar-likes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.guitarLike.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.guitarLike.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-GuitarLike">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.guitarLike.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.guitarLike.fields.guitar') }}
                        </th>
                        <th>
                            {{ trans('cruds.guitarLike.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guitarLikes as $key => $guitarLike)
                        <tr data-entry-id="{{ $guitarLike->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $guitarLike->id ?? '' }}
                            </td>
                            <td>
                                {{ $guitarLike->guitar->serial ?? '' }}
                            </td>
                            <td>
                                {{ $guitarLike->user->name ?? '' }}
                            </td>
                            <td>
                                @can('guitar_like_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.guitar-likes.show', $guitarLike->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('guitar_like_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.guitar-likes.edit', $guitarLike->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('guitar_like_delete')
                                    <form action="{{ route('admin.guitar-likes.destroy', $guitarLike->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('guitar_like_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.guitar-likes.massDestroy') }}",
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
  let table = $('.datatable-GuitarLike:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@extends('layouts.admin')
@section('content')
@can('mother_like_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mother-likes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.motherLike.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.motherLike.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MotherLike">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.motherLike.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherLike.fields.mother') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherLike.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motherLikes as $key => $motherLike)
                        <tr data-entry-id="{{ $motherLike->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $motherLike->id ?? '' }}
                            </td>
                            <td>
                                {{ $motherLike->mother->title ?? '' }}
                            </td>
                            <td>
                                {{ $motherLike->user->name ?? '' }}
                            </td>
                            <td>
                                @can('mother_like_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mother-likes.show', $motherLike->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mother_like_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mother-likes.edit', $motherLike->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mother_like_delete')
                                    <form action="{{ route('admin.mother-likes.destroy', $motherLike->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mother_like_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mother-likes.massDestroy') }}",
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
  let table = $('.datatable-MotherLike:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
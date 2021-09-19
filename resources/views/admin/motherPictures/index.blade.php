@extends('layouts.admin')
@section('content')
@can('mother_picture_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mother-pictures.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.motherPicture.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.motherPicture.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MotherPicture">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.motherPicture.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherPicture.fields.mother') }}
                        </th>
                        <th>
                            {{ trans('cruds.motherPicture.fields.url') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motherPictures as $key => $motherPicture)
                        <tr data-entry-id="{{ $motherPicture->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $motherPicture->id ?? '' }}
                            </td>
                            <td>
                                {{ $motherPicture->mother->title ?? '' }}
                            </td>
                            <td>
                                {{ $motherPicture->url ?? '' }}
                            </td>
                            <td>
                                @can('mother_picture_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mother-pictures.show', $motherPicture->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mother_picture_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mother-pictures.edit', $motherPicture->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mother_picture_delete')
                                    <form action="{{ route('admin.mother-pictures.destroy', $motherPicture->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mother_picture_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mother-pictures.massDestroy') }}",
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
  let table = $('.datatable-MotherPicture:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
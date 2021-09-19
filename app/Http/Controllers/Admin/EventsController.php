<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Event::with(['author'])->select(sprintf('%s.*', (new Event())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'event_show';
                $editGate = 'event_edit';
                $deleteGate = 'event_delete';
                $crudRoutePart = 'events';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('author_name', function ($row) {
                return $row->author ? $row->author->name : '';
            });

            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->editColumn('hours_endurance', function ($row) {
                return $row->hours_endurance ? $row->hours_endurance : '';
            });
            $table->editColumn('price_vod', function ($row) {
                return $row->price_vod ? $row->price_vod : '';
            });
            $table->editColumn('price_live', function ($row) {
                return $row->price_live ? $row->price_live : '';
            });
            $table->editColumn('link_live', function ($row) {
                return $row->link_live ? $row->link_live : '';
            });
            $table->editColumn('link_vod', function ($row) {
                return $row->link_vod ? $row->link_vod : '';
            });
            $table->editColumn('percent_to_author', function ($row) {
                return $row->percent_to_author ? $row->percent_to_author : '';
            });
            $table->editColumn('cover_img', function ($row) {
                return $row->cover_img ? $row->cover_img : '';
            });
            $table->editColumn('cover_video', function ($row) {
                return $row->cover_video ? $row->cover_video : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'author']);

            return $table->make(true);
        }

        return view('admin.events.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.events.create', compact('authors'));
    }

    public function store(StoreEventRequest $request)
    {
        $event = Event::create($request->all());

        return redirect()->route('admin.events.index');
    }

    public function edit(Event $event)
    {
        abort_if(Gate::denies('event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event->load('author');

        return view('admin.events.edit', compact('authors', 'event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());

        return redirect()->route('admin.events.index');
    }

    public function show(Event $event)
    {
        abort_if(Gate::denies('event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->load('author');

        return view('admin.events.show', compact('event'));
    }

    public function destroy(Event $event)
    {
        abort_if(Gate::denies('event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

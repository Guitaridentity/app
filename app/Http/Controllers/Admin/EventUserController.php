<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventUserRequest;
use App\Http\Requests\StoreEventUserRequest;
use App\Http\Requests\UpdateEventUserRequest;
use App\Models\Event;
use App\Models\EventUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EventUserController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('event_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EventUser::with(['event'])->select(sprintf('%s.*', (new EventUser())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'event_user_show';
                $editGate = 'event_user_edit';
                $deleteGate = 'event_user_delete';
                $crudRoutePart = 'event-users';

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
            $table->addColumn('event_title', function ($row) {
                return $row->event ? $row->event->title : '';
            });

            $table->editColumn('user', function ($row) {
                return $row->user ? $row->user : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'event']);

            return $table->make(true);
        }

        return view('admin.eventUsers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.eventUsers.create', compact('events'));
    }

    public function store(StoreEventUserRequest $request)
    {
        $eventUser = EventUser::create($request->all());

        return redirect()->route('admin.event-users.index');
    }

    public function edit(EventUser $eventUser)
    {
        abort_if(Gate::denies('event_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eventUser->load('event');

        return view('admin.eventUsers.edit', compact('events', 'eventUser'));
    }

    public function update(UpdateEventUserRequest $request, EventUser $eventUser)
    {
        $eventUser->update($request->all());

        return redirect()->route('admin.event-users.index');
    }

    public function show(EventUser $eventUser)
    {
        abort_if(Gate::denies('event_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventUser->load('event');

        return view('admin.eventUsers.show', compact('eventUser'));
    }

    public function destroy(EventUser $eventUser)
    {
        abort_if(Gate::denies('event_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventUserRequest $request)
    {
        EventUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventUserRequest;
use App\Http\Requests\UpdateEventUserRequest;
use App\Http\Resources\Admin\EventUserResource;
use App\Models\EventUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventUserApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventUserResource(EventUser::with(['event'])->get());
    }

    public function store(StoreEventUserRequest $request)
    {
        $eventUser = EventUser::create($request->all());

        return (new EventUserResource($eventUser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EventUser $eventUser)
    {
        abort_if(Gate::denies('event_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventUserResource($eventUser->load(['event']));
    }

    public function update(UpdateEventUserRequest $request, EventUser $eventUser)
    {
        $eventUser->update($request->all());

        return (new EventUserResource($eventUser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EventUser $eventUser)
    {
        abort_if(Gate::denies('event_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventUser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Observers;

use App\Models\Guitar;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class GuitarActionObserver
{
    public function created(Guitar $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Guitar'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}

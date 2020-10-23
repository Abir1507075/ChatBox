<?php

use Illuminate\Support\Facades\Broadcast;
use App\Events\formSubmitted;
use App\Events\messageSent;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('present', function($user){
    return [
        'id' => $user->id,
        'name' =>$user->name
    ];
});

Broadcast::channel('sent-to.{id}', function(User $user,$id){
    return $user->id == $id;
});

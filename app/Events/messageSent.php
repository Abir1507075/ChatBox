<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;
use App\Models\Message;

class messageSent implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user,$mesg;
    public function __construct(User $user,Message $mesg)
    {
        $this->user=$user;
        $this->mesg=$mesg;
    }
    public function broadcastOn()
    {
        return new PrivateChannel('sent-to.'.$this->user->id) ;
    }
    public function broadcastAs(){
        return 'message-sent';
    }
}

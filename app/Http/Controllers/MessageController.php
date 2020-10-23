<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\messageSent;
class MessageController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function create(User $user){
        // request()->validate([
        //     'message' => 'required',
        // ]);
        // $ret = Message::create([
        //     'message' => request('message'),
        //     'sender_id' => Auth::user()->id,
        //     'receiver_id' => $user->id
        // ]);

        // broadcast(new messageSent($user,$ret));
        // return json_encode($ret);


            // return json_encode([
            //     'user_id' => Auth::user()->id,
            //     'sender_id'=>$user,
            //     'message'=>request('message')
            // ]);
            request()->validate([
                'message' => 'required'
            ]);
            $auth_id=Auth::user()->id;
            $big = max($auth_id,$user->id);
            $small =  min($auth_id,$user->id);
            $dir = false;
            if($auth_id<$user->id){
                $dir = true;
            }
            $ret = Message::create([
               'big_id' =>$big,
               'small_id' =>$small,
               'message' =>request('message'),
               'direction' =>$dir
            ]);

            broadcast(new messageSent($user,$ret));
            return $ret;
      }

    public function show(User $user){
        // $m1 =  Auth::user()->sent->where('receiver_id',$user->id);
        // $m2 = $user->sent->where('receiver_id',Auth::user()->id);

        // $m1= $m1->merge($m2);
        // $m3= $m1->sortBy('created_at');
        // // $m3 = CollectionHelper::paginate($m3,10);
        // return json_encode($m3->values()->all());

        $auth_id=Auth::user()->id;
        $big = max($auth_id,$user->id);
        $small =  min($auth_id,$user->id);
        $message = Message::where('big_id',$big)->where('small_id',$small)->latest()->paginate(10);
        if(request()->ajax()){
             return $message;
        }
        return $message;
    }
}

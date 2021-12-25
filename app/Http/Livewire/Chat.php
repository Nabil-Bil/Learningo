<?php

namespace App\Http\Livewire;

use App\Events\MessageNotification;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $sender_id;
    public $receiver_id;
    public $receiver;
    public $salon_id;
    public $all_messages;
    public $message;
    
    protected $rules=[
        'message'=>'required'
    ];
    
    public function mount()
    {
        
        $this->sender_id=Auth::user()->id;
        $this->receiver=User::find($this->receiver_id);

        $this->all_messages=Message::OrderBy('created_at')->where([['salon_id',$this->salon_id]])
                                ->where(function($q){
                                    $q->where([
                                        ['sender_id',$this->sender_id],
                                        ['receiver_id',$this->receiver_id]
                                    ])->orWhere(
                                        [
                                        ['sender_id',$this->receiver_id],
                                        ['receiver_id',$this->sender_id],
                                        ]);
                                    })->get();
                            
        
        
   
    }

    public function send()
    {
        $this->validate();
       
        $message=new Message();
        $message->content=$this->message;
        $message->sender_id=Auth::user()->id;
        $message->receiver_id=$this->receiver_id;
        $message->salon_id=$this->salon_id;
        $message->save();

        $this->message=null;
        event(new MessageNotification($this->receiver_id));
        $this->mount();
        $this->render();
    }

    public function getListeners()
    {

        return [
            "echo-private:privateMessage.{$this->sender_id},MessageNotification" => 'notifyNewMessage',
        ];
    }

    public function notifyNewMessage()
    {
        $this->mount();
        $this->render();
        
    }

    public function render()
    {
        return view('livewire.chat');
    }
}

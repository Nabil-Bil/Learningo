<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $user;
    public function mount()
    {
       $this->user=User::find($this->comment->user_id);
    }

    public function delete(){
        $this->comment->delete();
        $this->emit('reRenderParent');
        
    }

    public function render()
    {

        return view('livewire.comment');
    }
}

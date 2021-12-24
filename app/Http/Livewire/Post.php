<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Post extends Component
{
    public $post;
    public $user;
    public $comment;
    public $all_comments;
    protected $listeners = ['reRenderParent2'];
    protected $rules=[
        'comment'=>'required',
    ];
    public function mount(){
        $this->user=User::find($this->post->user_id);
        $this->all_comments=$this->post->comments;
    }

    public function delete(){
        $this->post->delete();
        $this->emit('reRenderParent');
        
    }

    public function reRenderParent2()
    {
        $this->mount();
        $this->render();
    }

    public function submit()
    {
        $this->validate();
        $comment=new Comment();
        $comment->content=$this->comment;
        $comment->user_id=Auth::user()->id;
        $comment->post_id=$this->post->id;
        $comment->save();
        $this->comment=null;
        $this->emit('reRenderParent');
        

    }
    
    public function render()
    {
        $this->all_comments=$this->post->comments;
        return view('livewire.post');
    }


}

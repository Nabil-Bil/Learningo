<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Salon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Forum extends Component 
{
    use WithFileUploads;

    public $post;
    public $files=[];
    public $salon_id;
    public $all_posts;
    protected $listeners = ['reRenderParent'];
    
    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }

    protected $rules=[
        'post'=>'required',
    ];


    public function submit()
    {
        $this->validate();
        dd($this->files);
        $post=new Post();
        $post->content=$this->post;
        $post->salon_id=$this->salon_id;
        $post->user_id=Auth::user()->id;
        $post->save();
        $this->post=null;

    }

    public function render()
    {
        $this->all_posts=Salon::find($this->salon_id)->posts;
        return view('livewire.forum');
    }
}

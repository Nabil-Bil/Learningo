<?php

namespace App\Http\Livewire;

use App\Models\Path;
use App\Models\Post;
use App\Models\Salon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Forum extends Component 
{
    use WithFileUploads;

    public $post;
    public $files=[];
    public $salon_id;
    public $all_posts;
    protected $listeners = ['reRenderParent'];
    protected $rules=[
        'post'=>'required',
        'files.*'=>'mimes:pdf,png,jpg,mp4,mkv,docx,doc,pptx'
    ];
    

    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }

    public function submit()
    {
        $this->validate(); 
        $post=new Post();
        $post->content=$this->post;
        $post->salon_id=$this->salon_id;
        $post->user_id=Auth::user()->id;
        $post->save();

        
        foreach($this->files as $file){

            $file_name=time() . $file->getClientOriginalName();
            $file->storeAs('/public/files',$file_name);
             $path=new Path();
             $path->salon_id=$this->salon_id;
             $path->post_id=$post->id;
             $path->path="storage/files/". $file_name;
            $path->extension=$file->getClientOriginalExtension();
            $path->save();
        }

        $this->files=[];
        $this->post="";

    }

    public function render()
    {
        $this->all_posts=Salon::find($this->salon_id)->posts;
        return view('livewire.forum');
    }
}

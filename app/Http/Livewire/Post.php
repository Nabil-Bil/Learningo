<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $title;
    public $content;
    public $posts;

    protected $rules=[
        'title'=>'required',
        'content'=>'required'
    ];

    public function submit()
    {
        $this->validate();
    }

    public function mount()
    {
        
    }
    public function render()
    {
        return view('custom.post');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Request extends Component
{
    public $data;

    public function accept($id)
    {
        User::find($id)->update(['role'=>'enseignant']);
        $this->emit('reRenderParent');

    }

    public function refuse($id)
    {
        User::find($id)->update(['role'=>'etudiant']);
        $this->emit('reRenderParent');

    }
    
    public function render()
    {
        return view('livewire.request');
    }
}

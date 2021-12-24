<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminRequests extends Component
{
    public $datas;
    protected $listeners = ['reRenderParent'];
    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }
    public function render()
    {   
        $this->datas=User::get()->where('role','pre_enseignant');
        return view('custom.admin.admin-requests');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminRequests extends Component
{
    public $datas;

    public function accept($id)
    {
        User::find($id)->update(['role'=>'enseignant']);

    }

    public function refuse($id)
    {
        User::find($id)->update(['role'=>'etudiant']);

    }
    public function render()
    {   
        $this->datas=User::get()->where('role','pre_enseignant')->toArray();
        return view('custom.admin.admin-requests');
    }
}

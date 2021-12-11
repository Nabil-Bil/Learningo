<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminUsers extends Component
{
    public $users;
    public int $editId=0;

    public function mount()
    {
        $this->users=User::get();
    }


    public function startEdit(int $id)
    {
        if($this->editId===0){
            $this->editId=$id;
        }
        else
            $this->editId=0;

        
       
    }
    public function delete($id){
        User::find($id)->delete();
        $this->users=User::get();
    }
    public function render()
    {

        
        return view('custom.admin.admin-users');
    }
}

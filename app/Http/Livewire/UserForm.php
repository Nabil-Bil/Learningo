<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class UserForm extends Component
{
    public User $user;

    protected $rules = [
        'user.first_name'=>'required|string'
    ];

    
    public function save()
    {
       sleep(3);
    }
    public function render()
    {
       
        return view('livewire.user-form');
    }
}

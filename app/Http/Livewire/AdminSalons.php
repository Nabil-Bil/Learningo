<?php

namespace App\Http\Livewire;

use App\Models\Salon;
use App\Models\User;
use Livewire\Component;

class AdminSalons extends Component
{
    public $salons;

    public function mount()
    {
        $this->salons=Salon::get();
    }
    public function delete($id)
    {
        $salon=Salon::find($id);
        $salon->delete();

      $this->salons=Salon::get();  
    }
    public function render()
    {

        return view('custom.admin.admin-salons');
    }
}

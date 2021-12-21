<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
       if(Auth::user()->role=='admin'){
           return redirect()->route('admin.dashboard');
       }
       else{
           return redirect()->route('dashboard');
       }
    }

    public function dashboard()
    {
        $salons=Auth::user()->salons;
        
        return view('dashboard',[
            'salons'=>$salons,
        ]);
    }
}

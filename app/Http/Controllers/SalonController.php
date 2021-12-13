<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SalonController extends Controller
{
    public function create(){
        return view('custom.salonForm');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>['required','min:6'],
                'module'=>['required'],
                'description'=>['required','min:8'],
            ]
            );  
        $salon=new Salon();
        $salon->name=$request->name;
        $salon->description=$request->description;
        $salon->user_id=Auth::user()->id;
        $salon->image_path="EEEEE";
        $salon->codeSalon=Str::random(6);
        $salon->module=$request->module;
        $salon->save();
     
        $salon->users()->attach(Auth::user()->id);



        

        return redirect()->route('dashboard');
        
    }
}

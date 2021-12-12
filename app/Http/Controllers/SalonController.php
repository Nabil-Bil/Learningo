<?php

namespace App\Http\Controllers;

use App\Models\Salon;
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
        $all_photos=Storage::allFiles('public/salon-image');  
        $salon=new Salon();
        $salon->name=$request->name;
        $salon->matiere=$request->module;
        $salon->description=$request->description;
        $salon->user_id=Auth::user()->id;
        $salon->image_path=Str::after($all_photos[rand(0,count($all_photos)-1)],'public/');
        $salon->codeSalon=Str::random(6);
        
        $salon->save();

        return redirect()->back();
        
    }
}

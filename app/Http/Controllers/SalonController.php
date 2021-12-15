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
    private $colors=['red','indigo','blue','gray','yellow','green','purple','pink'];
    private $opacity=['100','200','300','400'];

    private function get_color(){
        $random_index_color=array_rand($this->colors);
        $random_index_opacity=array_rand($this->opacity);
        return $this->colors[$random_index_color] . "-" . $this->opacity[$random_index_opacity];
    }

    private function generate_code(){
        return Str::random(6);
    }
    public function create(){
        return view('custom.salon.salonForm');
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
        $salon->color_code=$this->get_color();

        do{
            $salon->codeSalon=$this->generate_code();
        }while(!empty(Salon::where('codeSalon',$salon->codeSalon)->get()->first()));
        
        $salon->module=$request->module;
        
        $salon->save();
     
        $salon->users()->attach(Auth::user()->id);

        return redirect()->route('dashboard');
        
    }

    public function join_view()
    {
        return view('custom.salon.joinSalon');
    }

    public function join(Request $request){
        $request->validate([
            'code_salon'=>['required','size:6']
        ]);
        
        $salon=Salon::where('codeSalon',$request->code_salon)->get()->first();
        
        
        
        if($salon==null){
            return redirect()->back()->withErrors("This salon doesn't exist");
        }
        else{
            if(!empty(Salon::find($salon->id)->member->first())){
                return redirect()->back()->withErrors("You are already member of this salon");
            }
            Salon::find($salon->id)->users()->attach(Auth::user()->id);
            return redirect()->route('salon.show',$salon->id);
        }
    }

    public function show($id)
    {
        
    }
}

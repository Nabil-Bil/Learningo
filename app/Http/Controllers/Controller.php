<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
    public function welcome()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $salons=Auth::user()->salons;
        
        return view('dashboard',[
            'salons'=>$salons,
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_send(Request $request)
    {   
        $email=null;
        if(Auth::check()){
            $email=Auth::user()->email;
        }
        Mail::to("eLearningEntreprise@gmail.com")->send(new ContactMail(['name'=>$request->name,'post'=>$request->post,'email'=>$email]));
     return redirect()->back();
    }
}

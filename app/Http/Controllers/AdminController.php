<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('custom.admin.admin-dashboard');
    }

    public function editUser($user_id){

        $user=User::findOrFail($user_id);
        return view('custom.admin.admin-update-user',[
            'user'=>$user
        ]);

    }
    public function editSalon($salon_id){
        $salon=Salon::findOrFail($salon_id);
        return view('custom.admin.admin-update-salon',[
            'salon'=>$salon
        ]);
    }


    public function updateUser($user_id,Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>['required','email'],
            'role'=>['required',Rule::in(['etudiant','enseignant','pre_enseignant'])],
        ]);

        User::find($user_id)->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'role'=>$request->role,
        ]);

        return redirect()->route('admin.users');
       
    }
    public function updateSalon($salon_id,Request $request)
    {
       $request->validate([
           'name'=>'required',
           'description'=>'required',
       ]);
       Salon::find($salon_id)->update([
           'name'=>$request->name,
           'description'=>$request->description
       ]);

       return redirect()->route('admin.salons');
    }
}

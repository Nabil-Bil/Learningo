<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\MessageNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class SalonController extends Controller
{
    private $api_key="31a831b1fe70f74642933f69ac14bb5a82d545d7419ef120b400a03f3aea17ca";
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
                'name'=>['required',],
                'module'=>['required'],
                'description'=>['required'],
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

        $response=Http::
        withToken($this->api_key)
        ->post('https://api.daily.co/v1/rooms/',[
         'name'=>$salon->codeSalon,
         'properties'=>[
            'enable_network_ui'=>true,
            'enable_chat'=>true,
            'start_video_off'=>true,
            'start_audio_off'=>true,
            'lang'=>'fr'
         ]
      ]);
        $response=json_decode($response,true);

        $salon->meetUrl=$response['url'];
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
            return redirect()->route('salon.forum',$salon->id);
        }
    }

    public function forum($id)
    {
        return view('custom.salon.salon-content.forum',[
            'id'=>$id
        ]);
    }

    public function members($id)
    {
        $members=Salon::find($id)->users;
        $num=count($members);
        
        $enseignant_id=Salon::find($id)->user_id;
        
       return view('custom.salon.salon-content.members',[
           'id'=>$id,
           'members'=>$members,
           'num'=>$num,
           'enseignant_id'=>$enseignant_id,
       ]);
    }

    public function exclude($id,Request $request){
        $user=User::find($request->member_id);
        $sender_messages= $user->sender_messages;
        $receiver_messages= $user->receiver_messages;
        $sender_messages->each->delete();
        $receiver_messages->each->delete();
        Salon::find($id)->users()->detach($request->member_id);
        return redirect()->back();
    }

    public function chat($id,$receiver_id)
    {
        return view('custom.salon.salon-content.chat',[
            'id'=>$id,
            'receiver_id'=>$receiver_id
        ]);
    }

    public function room($id)
    {
        $url=Salon::find($id)->meetUrl;
        return view('custom.salon.salon-content.room',[
            'url'=>$url
        ]);
    }
    public function exit($id)
    {
        $salon=Salon::find($id)->first();
        $sender_messages= Auth::user()->sender_messages;
        $receiver_messages=  Auth::user()->receiver_messages;
        $sender_messages->each->delete();
        $receiver_messages->each->delete();
        $salon->member()->detach();
        if($salon->user_id==Auth::user()->id){
            
            $salon->update([
                'user_id'=>$salon->users()->first()->id
            ]);
        }
        

        return redirect()->route('dashboard');
        
    }

    public function delete($id)
    {
        $salon=Salon::find($id);
        Http::
        withToken($this->api_key)
        ->delete('https://api.daily.co/v1/rooms/'.$salon->codeSalon
      );
        $salon->delete();
        return redirect()->route('dashboard');
    }
}

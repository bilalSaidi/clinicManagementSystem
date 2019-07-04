<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;
use App\User;
class editProfilesController extends Controller
{
    
    public function index()
    {
        return view('pagesDashDoctor.editProfiles')->with([
                                                            'setting'=> setting::find(1) , 
                                                            'UserDoctor' => User::find(1),
                                                            'UserReception' => User::find(2)
                                                    ]);
    }

 
    public function update(Request $request)
    {
        
        $this->validate($request,[
                'emailDoctor' =>  "required|email" , 
                'EmailReception' =>  "required|email"
        ]);
        $doctor = User::find(1);
        $reception = User::find(2);

        $doctor->email = $request->emailDoctor;
        $reception->email = $request->EmailReception;

        if(!empty($request->newpasswordDoctor)){
            $newpasswordDoctor = bcrypt($request->newpasswordDoctor);
            $doctor->password = $newpasswordDoctor;
        }

        if(!empty($request->newpasswordReception)){
            $newpasswordReception = bcrypt($request->newpasswordReception);
            $reception->password = $newpasswordReception;  
        }
        $doctor->save();
        $reception->save();
        return redirect()->back();

    }

   
}

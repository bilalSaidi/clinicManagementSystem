<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class loginController extends Controller
{
    
    public function login(Request $request){

        if (Auth::attempt([
              'email' => $request->email ,
              'password'  => $request->password
          ])) {

              $user = User::where('email' , $request->email )->first();
            
              if ($user->count() > 0 ) {
                      if ($user->is_doctor()) {
                          return redirect()->route('dashDoctor')->with('case' , $user);
                      }else{
                            return redirect()->route('dashReception')->with('case' , $user );
                      }
              }else{
                
                return redirect()->back();
              }


        }else{
            session()->flash('errorLogin','Email Or Password Not Valid ');
            return redirect()->back();

        }

    }

    public function reset(){
        
    }



}

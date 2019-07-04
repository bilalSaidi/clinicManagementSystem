<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;
use App\patient;
class siteUiController extends Controller
{
    
    public function index()
    {
        return view('index')->with('setting' , setting::find(1) );
    }

    public function newProfile(){

        return view('createNewProfile');

    }

    public function storeProfile(Request $request){

        $existPhone = patient::where('phone',$request->phone)->first();
        if(count($existPhone) > 0){

            session()->flash('Existphone','This Phone Already Used In Another Profile ');
            return redirect()->back();

        }else{
            
            $this->validate($request,[
                "firstName" => "required",
                "lastName" => "required",
                "fatherName" => "required",
                "gender" => "required",
                "phone" => "required",
                "age" => "required",
                "adress" => "required",
                "socialId" => "required",
                "idType" => "required",
                "birthDate" => "required"
            ]);
    
            $patient = new patient;
            $patient->firstName = $request->firstName;
            $patient->lastName = $request->lastName;
            $patient->fatherName = $request->fatherName;
            $patient->gender = $request->gender;
            $patient->phone = $request->phone;
            $patient->age = $request->age;
            $patient->adress = $request->adress;
            $patient->socialId = $request->socialId;
            $patient->idType = $request->idType;
            $patient->birthDate = $request->birthDate;
            if(! empty($request->email)){
                $patient->email = $request->email;
            }
            if(! empty($request->facebookAcount)){
                $patient->facebookAcount = $request->facebookAcount;
            }
            $patient->save();
    
            session()->flash('successSendProfile',' Profile Saved Successfully ');
            return redirect()->back();

        }
        

    }

    
}

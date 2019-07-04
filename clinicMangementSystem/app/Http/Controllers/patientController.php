<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\patient;

class patientController extends Controller
{
  
    public function index()
    {
        return view('pagesDashReception.patients')->with('patients',patient::all());
    }

    
    public function create()
    {
        return view('pagesDashReception.createPatients');
    }

    
    public function store(Request $request)
    {
       

        
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
    
            session()->flash('success','Patient Add Successfully');
            return redirect()->back();

        }
        
    }

   
    public function edit($id)
    {
        return view('pagesDashReception.editPatient')->with('patient', patient::find($id) );
    }

    
    public function update(Request $request, $id)
    {
        $data = $this->validate($request,[
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
        $upatient  = patient::find($id) ; 
        $upatient->firstName = $request->firstName ;
        $upatient->lastName = $request->lastName;
        $upatient->fatherName = $request->fatherName;
        $upatient->gender = $request->gender;
        $upatient->phone = $request->phone;
        $upatient->age = $request->age;
        $upatient->adress = $request->adress;
        $upatient->socialId = $request->socialId;
        $upatient->idType = $request->idType;
        $upatient->birthDate = $request->birthDate;
        if(!empty($request->facebookAcount)){
            $upatient->facebookAcount = $request->facebookAcount;
        }
        if(!empty($request->email)){
            $upatient->email = $request->email;
        }

        $upatient->save();

        session()->flash('adduser','User Updated Successfully ');
        
        return redirect()->back();

    }

    
    public function destroy($id)
    {
        $patient = patient::find($id)->delete();

        return redirect()->route('waitingList');
        
    }

    public function profile($id){
        $patinet = patient::find($id);
        $dataAppointment = DB::table('clinic_appointments')
            ->join('patients','patients.id','=','clinic_appointments.patient_id')
            ->select('clinic_appointments.start','clinic_appointments.end','clinic_appointments.status')
            ->where('clinic_appointments.patient_id' , '=' , $id)
            ->get();
            
        return view("pagesDashReception.profile")->with(['patient' => $patinet , 'dataAppointment' => $dataAppointment ]);
    }
}

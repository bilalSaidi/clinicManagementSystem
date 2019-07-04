<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ClinicAppointment;
use Illuminate\Support\Facades\Auth;
use App\patient;
use App\setting;
class ClinicAppointmentContrller extends Controller
{
    
    public function index()
    {
        $user = Auth::id();
        return view('pagesDashReception.ClinicAppointment')->with([
                                                            'patients' => patient::all() ,
                                                            'user' => $user ,
                                                             'setting'=>setting::find(1) 
                                                            ]);
    }

    
    public function create(Request $request)
    {
        $data = $this->validate($request,[
            "color" => "required",
            "TextColor" => "required",
            "start" => "required",
            "end" => "required",
            "patient_id" => "required",
         ]);
 
         ClinicAppointment::create($data);
 
         session()->flash('successAppointment','Appointment Add Successfully');
         return redirect()->back();
    }

   


    public function update(Request $request)
    {
        $this->validate($request,[
            "id" => "required",
            "status" => "required",
            "startHourConfig" => "required",
            "start" => "required",
            "end" => "required",
            "endHourConfig" => "required",
            "color" => "required",
            "TextColor" => "required"
        ]);
        $Appointment = ClinicAppointment::find($request->id);
        $Appointment->status = $request->status ;
        $Appointment->start = $request->start ;
        $Appointment->end = $request->end ;
        $Appointment->color = $request->color ;
        $Appointment->TextColor = $request->TextColor ;
        $Appointment->save();
        session()->flash('successUpdateAppointment','Appointment Updated Successfully');
        return redirect()->back();
    }


    public function resaultAll()
    {
        
        $data = DB::table('clinic_appointments')
            ->join('patients','patients.id','=','clinic_appointments.patient_id')
            ->select('patients.firstName','patients.lastName','patients.phone','clinic_appointments.*')
            ->get();
        echo json_encode($data);
    }

    public function resize(Request $request){
            $appointment = ClinicAppointment::find($request->id);

            $appointment->start = $request->start;
            $appointment->end = $request->end;
            $appointment->save();
        

    }
}

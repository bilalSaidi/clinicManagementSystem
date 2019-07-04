<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\watingList;

class watingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pagesDashReception.waitingList')->with('waitingList',watingList::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patinet = patient::where('phone',$request->Phone )->where('firstName',$request->firstName)->where('lastName',$request->LastName)->first();
        if(count($patinet) > 0 ){
            $existInWaitingList = watingList::where('idPatient',$patinet->id)->first();
            if(count($existInWaitingList) > 0){ // If Patient Already Exist iN Waiting List
                session()->flash('ExistinWaitingList','You Already Take An  Appointment');
                return redirect()->back();
            }else{
                $addpatient = new watingList;
                $addpatient->id =$request->id;
                $addpatient->Phone =$request->Phone;
                $addpatient->firstName =$request->firstName;
                $addpatient->lastName =$request->LastName;
                $addpatient->idPatient =$patinet->id;
                $addpatient->save();
                session()->flash('successAppointement','Your Appointment Send Successfully ');
                return redirect()->back();
            }
            

        }else{
            session()->flash('NoProfile','Not Correct Filed Information Or You Dont Have A Profile');
            return redirect()->back();
        }
    }

    
    public function destroy($id)
    {
        
        $appointementDelet  = watingList::find($id)->delete();

        return redirect()->back();
    }
}

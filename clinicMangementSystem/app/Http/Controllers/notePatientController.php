<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use PDF;
use App\patient;

use App\notePatient;
use App\setting;
use Illuminate\Support\Facades\DB;

class notePatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $patinet = patient::find($id);
        $notesPatient = DB::table('note_patients')
            ->join('patients','patients.id','=','note_patients.idPatient')
            ->select('note_patients.id','note_patients.Note','note_patients.created_at')
            ->where('note_patients.idPatient' , '=' , $id)
            ->get();
        return view('pagesDashDoctor.patientNote')->with(['patient' =>$patinet , 'setting' => setting::find(1),'notesPatient'=>$notesPatient]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "Note" => "required",
            "idPatient" => "required"
        ]);
        $notePatient = new notePatient;
        $notePatient->idPatient = $request->idPatient;
        $notePatient->Note = $request->Note;
        $notePatient->save();
        session()->flash('AddNote','Note Adedd Successfully ');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = notePatient::find($id);
        return view('pagesDashDoctor.patientNoteEdit')->with(['note' => $note , 'setting' => setting::find(1)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "Note" => "required"
        ]);

        $updateNote = notePatient::find($id);
        $updateNote->Note = $request->Note;

        $updateNote->save();
        session()->flash('UpdateNote','Note Updated Successfully ');

        return redirect()->back();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = notePatient::find($id)->delete();
        session()->flash('deleteNote','Note Deleted Successfully ');
        return redirect()->back();
    }

    public function pdf($id){
       /* prepare Information */ 

        $notePatient = notePatient::find($id);
        $Note =  $notePatient->Note;
        $pateintId = $notePatient->idPatient;
        $patinet = patient::find($pateintId);
        $firstName =  $patinet->firstName;
        $lastName = $patinet->lastName;
        $age = $patinet->age;
        $setting = setting::find(1);
        $doctor = $setting->name;
        $phone = $setting->Phone;

        /*Final Information */
        $infoRepport = ["Nom" => $firstName, "Prenom" =>$lastName, "Age" => $age, "Remarque" =>$Note , "doctor" => $doctor , "phone" => $phone ];
        

        
        $pdf = PDF::loadView('pagesDashDoctor.repportPatient',["repport"=>$infoRepport])->setPaper('a4', 'portrait');
        $fileName = $infoRepport['Nom'];
        return  $pdf->stream($fileName.'.pdf');
        
    }
}

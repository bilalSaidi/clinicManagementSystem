<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;

class settingController extends Controller
{
    
    public function index()
    {
        return view('pagesDashDoctor.setting')->with('setting',setting::find(1));
    }

   
    public function create(Request $request)
    {
        
        $setting =  setting::find(1);
        
        $this->validate($request,[
            'startday' => "required|string",
            'endday'  => "required|string" ,
            'StartMorningHour'  => "required|string" ,
            'EndMorningHour'  => "required|string" ,
            'StartEveningHour'  => "required|string" ,
            'EndEveningHour'  => "required|string" ,
            'name'  => "required|string" ,
            'Experinces'  => "required|string" ,
            'Phone'  => "required|string" ,
            'Adress'  => "required|string" ,
            'Fax'  => "required|string" ,
            'Email'  => "required|string",
            'srcProfileImage'  => "image",
            'MoreInformation'  => "required|string",
            'titleService1'  => "required|string",
            'srcService1'  => "image",
            'titleService2'  => "required|string" ,
            'srcService2'  => "image" ,
            'titleService3'  => "required|string" ,
            'srcService3'  => "image" ,
            'titleService4'  => "required|string" ,
            'srcService4'  => "image" ,
            'titleService5'  => "required|string" ,
            'srcService5'  => "image" ,
            'titleService6'  => "required|string" ,
            'srcService6'  => "image" ,
            'titleService7'  => "required|string" ,
            'srcService7'  => "image" ,
            'titleService8'  => "required|string" ,
            'srcService8'  => "image" ,
            'note1'  => "required|string" ,
            'note2'  => "required|string" ,
            'note3'  => "required|string" ,
            'location' =>   "image"
        ]);
        
        
        if ($request->hasFile('srcProfileImage')) {
            $profile =  $request->srcProfileImage;
            $newNameProfile = "PofirlDoctor.". $request->srcProfileImage->extension() ;
            $profile->move('uploads/Settings',$newNameProfile);
            $setting->srcProfileImage  = $newNameProfile;
        }
        if ($request->hasFile('srcService1')) {
            $img1 =  $request->srcService1;
            $newNamesrcService1 = "srcService1.". $request->srcService1->extension() ;
            $img1->move('uploads/Settings',$newNamesrcService1);
            $setting->srcService1  = $newNamesrcService1;
        }
        if ($request->hasFile('srcService2')) {
            $profile =  $request->srcService2;
            $newNamesrcService2 = "srcService2.". $request->srcService2->extension() ;
            $profile->move('uploads/Settings',$newNamesrcService2);
            $setting->srcService2  = $newNamesrcService2 ;
        }
        if ($request->hasFile('srcService3')) {
            $profile =  $request->srcService3;
            $newNamesrcService3 = "srcService3.". $request->srcService3->extension() ;
            $profile->move('uploads/Settings',$newNamesrcService3);
            $setting->srcService3  = $newNamesrcService3 ;
        }
        if ($request->hasFile('srcService4')) {
            $profile =  $request->srcService4;
            $newNamesrcService4 = "srcService4.". $request->srcService4->extension() ;
            $profile->move('uploads/Settings',$newNamesrcService4);
            $setting->srcService4  = $newNamesrcService4 ;
        }
        if ($request->hasFile('srcService5')) {
            $profile =  $request->srcService5;
            $newNamesrcService5 = "srcService5.". $request->srcService5->extension() ;
            $profile->move('uploads/Settings',$newNamesrcService5);
            $setting->srcService5  = $newNamesrcService5 ;
        }
        if ($request->hasFile('srcService6')) {
            $profile =  $request->srcService6;
            $newNamesrcService6 = "srcService6.". $request->srcService6->extension() ;
            $profile->move('uploads/Settings',$newNamesrcService6);
            $setting->srcService6  = $newNamesrcService6 ;
        }
        if ($request->hasFile('srcService7')) {
            $profile =  $request->srcService7;
            $newNamesrcService7 = "srcService7.". $request->srcService7->extension() ;
            $profile->move('uploads/Settings',$newNamesrcService7);
            $setting->srcService7  = $newNamesrcService7 ;
        }
        if ($request->hasFile('srcService8')) {
            $profile =  $request->srcService8;
            $newNamesrcService8 = "srcService8.". $request->srcService8->extension() ;
            $profile->move('uploads/Settings',$newNamesrcService8);
            $setting->srcService8  = $newNamesrcService8 ;
        }

        if ($request->hasFile('location')) {
            $imglocation =  $request->location;
            $newNamelocation = "location.". $request->location->extension() ;
            $imglocation->move('uploads/Settings',$newNamelocation);
            $setting->location  = $newNamelocation ;
        }
        $setting->startday = $request->startday;
        $setting->endday  = $request->endday ;
        $setting->StartMorningHour  = $request->StartMorningHour ;
        $setting->EndMorningHour  = $request->EndMorningHour ;
        $setting->StartEveningHour  = $request->StartEveningHour ;
        $setting->EndEveningHour  = $request->EndEveningHour ;
        $setting->name  =  $request->name ;
        $setting->Experinces  = $request->Experinces ;
        $setting->Phone  = $request->Phone ;
        $setting->Adress  =  $request->Adress ;
        $setting->Fax  =  $request->Fax ;
        $setting->Email  = $request->Email;
        $setting->MoreInformation  = $request->MoreInformation;
        $setting->titleService1  = $request->titleService1;
        $setting->titleService2  = $request->titleService2 ;
        $setting->titleService3  = $request->titleService3 ;
        $setting->titleService4  = $request->titleService4 ;
        $setting->titleService5  = $request->titleService5 ;
        $setting->titleService6  = $request->titleService6 ;
        $setting->titleService7  = $request->titleService7 ;
        $setting->titleService8  = $request->titleService8 ;
        $setting->note1  = $request->note1 ;
        $setting->note2  = $request->note2 ;
        $setting->note3  = $request->note3 ;
        $setting->save();

        return redirect()->back();
       
        
    }


}

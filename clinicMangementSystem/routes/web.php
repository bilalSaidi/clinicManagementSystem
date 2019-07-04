<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\setting;
use App\patient;

// Route For All Users 
Route::get('/', 'siteUiController@index')->name('index');
Route::get('/newProfile', 'siteUiController@newProfile')->name('newProfile');
Route::post('/storeProfile','siteUiController@storeProfile')->name('storeProfile');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/custom' , 'loginController@login')->name('login.custom');

// route for store patient 
Route::post('/patients/store',"patientController@store")->name('patients.store');

// route for create waiting list 
Route::post('/waitingList/create',"watingListController@create")->name('waitingList.create');

// Route For Admin Users 

Route::group(['middleware' => 'auth'] , function(){


     // Route For Clinic Dashboard Doctor & Dashboard Reception
     Route::get('/ClinicAppointment',"ClinicAppointmentContrller@index")->name('ClinicAppointment');
     Route::post('/ClinicAppointment/create',"ClinicAppointmentContrller@create")->name('ClinicAppointment.create');
     Route::post('/ClinicAppointment/update',"ClinicAppointmentContrller@update")->name('ClinicAppointment.update');
     Route::post('/ClinicAppointment/delete/{id}',"ClinicAppointmentContrller@destroy")->name('ClinicAppointment.delete');
     Route::post('/ClinicAppointment/resize',"ClinicAppointmentContrller@resize")->name('ClinicAppointment.resize');
     Route::get('/ClinicAppointment/resaultAll',"ClinicAppointmentContrller@resaultAll")->name('resaultAll');


    // Routing For Dashboard Doctor 
    Route::group(['middleware' => 'testDoctor'] , function(){


        Route::get('/dashDocotor' , function(){
                return view('dashDocotor')->with(['setting'=>setting::find(1) , 'patients'=>patient::all()]);
        })->name('dashDoctor');
        // route for setting dashdoctor 
        Route::get('/setting', 'settingController@index')->name('dashDocotor.setting');
        Route::post('/setting/create', 'settingController@create')->name('dashDocotor.create');

        // route for edit profiles 
        Route::get('/editProfiles', 'editProfilesController@index')->name('editProfiles');
        Route::post('/editProfiles/update', 'editProfilesController@update')->name('editProfiles.update');

        // route Fore Patient & Note 
        Route::get('/patientNote/{id}', 'notePatientController@index')->name('patientNote');
        Route::post('/patientNoteAdd', 'notePatientController@store')->name('patientNoteAdd');
        Route::get('/patientNotedestroy/{id}', 'notePatientController@destroy')->name('patientNotedestroy');
        Route::get('/patientNotedeedit/{id}', 'notePatientController@edit')->name('patientNoteedit');
        Route::post('/patientNoteUpdate/{id}', 'notePatientController@update')->name('patientNoteUpdate');
        Route::get('/patientpdf/{id}', 'notePatientController@pdf')->name('patientpdf');
    });


    // Routing For Dashboard Reception 
    Route::group(['middleware' => 'testReception'] , function(){



        Route::get('/dashReception' , function(){
            return redirect()->route('waitingList');
        })->name('dashReception');
        
        // Route For Patients 
        Route::get('/patients',"patientController@index")->name('patients');
        Route::get('/patients/create',"patientController@create")->name('patients.create');
        
        Route::get('/patients/destroy/{id}',"patientController@destroy")->name('patients.destroy');
        Route::get('/patients/profile/{id}',"patientController@profile")->name('patients.profile');
        Route::get('/patients/edit/{id}',"patientController@edit")->name('patients.edit');
        Route::post('/patients/update/{id}',"patientController@update")->name('patients.update');

       

        // Route For Waiting List 
        Route::get('/waitingList',"watingListController@index")->name('waitingList');
        
        Route::get('/waitingList/destroy/{id}',"watingListController@destroy")->name('waitingList.destroy');

    });


});




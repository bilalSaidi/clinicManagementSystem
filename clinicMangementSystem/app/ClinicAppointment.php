<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicAppointment extends Model
{
    protected $table = "clinic_appointments" ;
    protected $fillable = [
       'title',
       'description',
       'color',
       'TextColor',
       'start',
       'facebookAcount',
       'end',
       'patient_id'
    ]; 
 
}


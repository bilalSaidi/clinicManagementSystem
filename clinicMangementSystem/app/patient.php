<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
   protected $table = "patients" ;
   protected $fillable = [
      'firstName',
      'lastName',
      'fatherName',
      'gender',
      'phone',
      'facebookAcount',
      'age',
      'email',
      'adress',
      'socialId',
      'idType',
      'birthDate'
      
   ]; 



   
}

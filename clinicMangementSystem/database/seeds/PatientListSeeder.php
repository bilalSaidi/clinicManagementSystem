<?php

use Illuminate\Database\Seeder;
use App\patient;

class PatientListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 1000 ; $i++) { 
            $upatient = new patient ; 
            $upatient->firstName ="firstName" . rand(0,10000) ;
            $upatient->lastName = "lastName". rand(0,10000);
            $upatient->fatherName = "lastName". rand(0,10000);
            $upatient->gender = "male";
            $upatient->phone = "0".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            $upatient->age = rand(0,100);
            $upatient->adress = "adress". rand(0,10000);
            $upatient->socialId = rand(0,10000);
            $upatient->idType = "National Id Card";
            $upatient->birthDate = "1996-07-15";
            $upatient->facebookAcount = "facebookAcount" . rand(0,10000);
            $upatient->email = "bilal".rand(0,10000) . "@gmail.com";

            $upatient->save();
            
        }
    }
}

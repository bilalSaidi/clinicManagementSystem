<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notePatient extends Model
{
    protected $table = "note_patients";
    protected $fillable = [
        'id','Note','idPatient'
    ];
}

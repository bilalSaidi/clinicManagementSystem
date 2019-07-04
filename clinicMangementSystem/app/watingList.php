<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class watingList extends Model
{
    
    protected $table = "wating_lists";
    protected $fillable = [
        'id',
        'firstName',
        'LastName',
        'Phone',
        'idPatient'

    ];


}

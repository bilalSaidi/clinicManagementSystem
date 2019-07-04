<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $table = "settings";
    protected $fillable = [
        'startday',
        'endday',
        'StartMorningHour',
        'EndMorningHour',
        'StartEveningHour',
        'EndEveningHour',
        'name',
        'Experinces',
        'Phone',
        'Adress',
        'Fax',
        'Email',
        'srcProfileImage',
        'MoreInformation',
        'titleService1',
        'srcService1',
        'titleService2',
        'srcService2',
        'titleService3',
        'srcService3',
        'titleService4',
        'srcService4',
        'titleService5',
        'srcService5',
        'titleService6',
        'srcService6',
        'titleService7',
        'srcService7',
        'titleService8',
        'srcService8',
        'note1',
        'note2',
        'note3',
        'location'
    ];
}



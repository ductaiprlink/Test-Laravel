<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'table1';

    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'address',
        'city',
        'country',
        'state',
        'zip',
        'phone1',
        'phone2',
        'email',
        'web',
    ];
}

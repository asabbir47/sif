<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    //
    protected $fillable = ['name', 'student_id', 'fname','mname','dob'];
}

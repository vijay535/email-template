<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emailtemplate extends Model
{
    protected $fillable = ['user_id', 'message'];
}

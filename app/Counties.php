<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counties extends Model
{
    protected $fillable = ['name', 'code','sub_counties'];
}

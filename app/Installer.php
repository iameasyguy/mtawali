<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installer extends Model
{
    protected $fillable = ['name', 'address','phone','added_by'];

}

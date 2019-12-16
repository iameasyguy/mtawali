<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    protected $fillable = ['name', 'skilled','phone','added_by'];
}

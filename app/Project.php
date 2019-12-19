<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function report(){
        return $this->hasOne(Report::class);
    }
}

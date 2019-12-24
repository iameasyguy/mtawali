<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'client','area','created_by'];
    public function report(){
        return $this->hasOne(Report::class);
    }

   public static function boot()
    {
        parent::boot();

        static::deleting(function($project){
            $project->report()->delete();
        });
    }
}

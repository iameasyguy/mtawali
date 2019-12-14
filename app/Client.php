<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'email', 'contact_person','phone','county','sub_county','area','username'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

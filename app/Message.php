<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;

    public function enseignant()
    {
        return $this->hasOne('App\Enseignant', 'id', 'expediteur');
    }
}

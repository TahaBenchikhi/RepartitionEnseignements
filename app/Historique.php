<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    public $timestamps = false;

    public function enseignant()
    {
        return $this->belongsTo('App\Enseignant', 'idenseignant', 'id');
    }

    public function session()
    {
        return $this->belongsTo('App\Session', 'idsession', 'id');
    }

    public function ue()
    {
        return $this->hasMany('App\Ue', 'id', 'idue');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repartition extends Model
{
    public $timestamps = false;

    public function enseignant()
    {
        return $this->belongsTo('App\Enseignant', 'idenseignant', 'id');
    }

    public function ue()
    {
        return $this->belongsTo('App\Ue', 'idue', 'id');
    }

    public function session()
    {
        return $this->belongsTo('App\Session', 'idsession', 'id');
    }

    public function commentaire()
    {
        return $this->hasOne('App\Commentaire', 'idvoeu', 'idenseignant');
    }
}

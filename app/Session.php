<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $timestamps = false;

    public function repartition()
    {
        return $this->hasMany('App\Repartition');
    }

    public function historique()
    {
        return $this->hasMany('App\Historique', 'idsession', 'id');
    }
}

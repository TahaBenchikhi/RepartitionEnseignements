<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public $timestamps = false;
    public $table = "commentaires_voeu";

    public function repartition()
    {
        return $this->belongsTo('App\Repartition');
    }
}

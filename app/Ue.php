<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    public $timestamps = false;


    public function delete()
    {
        $this->repartition()->delete();
        $this->Historique()->delete();
        $this->commentaireue()->delete();
        return parent::delete();
    }

    public function repartition()
    {
        return $this->hasMany('App\Repartition', 'idue');
    }

    public function Historique()
    {
        return $this->hasMany('App\Historique', 'idue');
    }

    public function commentaireue()
    {
        return $this->hasOne('App\CommentaireUE', 'idue', 'id');
    }
}

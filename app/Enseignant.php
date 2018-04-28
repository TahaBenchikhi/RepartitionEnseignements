<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    public $timestamps = false;

    public function delete()
    {
        $this->repartition()->delete();
        $this->historique()->delete();
        $this->commentaireens()->delete();
        $this->message()->delete();
        $this->user()->delete();

        return parent::delete();
    }

    public function repartition()
    {
        return $this->hasMany('App\Repartition', 'idenseignant', 'id');
    }

    public function historique()
    {
        return $this->hasMany('App\Historique', 'idenseignant', 'id');
    }

    public function commentaireens()
    {
        return $this->hasOne('App\CommentaireEnseignant', 'idenseignant', 'id');
    }

    public function message()
    {
        return $this->hasMany('App\Message', 'destinataire', 'id')->orderBy('date', 'desc');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'idenseignant');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentaireEnseignant extends Model
{
    public $timestamps = false;
    public $table = "commentaires_enseignant";


    public function enseignant()
    {
        return $this->belongsTo('App\Enseignant');
    }
}

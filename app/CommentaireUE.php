<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentaireUE extends Model
{
    public $timestamps = false;
    public $table = "commentaires_ue";

    public function ue()
    {
        return $this->belongsTo('App\Ue');
    }


}

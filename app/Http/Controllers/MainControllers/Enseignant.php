<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Enseignant extends Controller
{
    public function getView()
    {
        $user = \App\Enseignant::find(Auth::user()->id);
        $historiques = \App\Historique::where('idenseignant', Auth::user()->id)->with('enseignant', 'ue', 'session')->get();
        if (empty($historiques)) $user = $historiques[0]->enseignant;
        $json1 = json_decode($historiques);
        $json2 = json_decode($user);

        Session::set('histo', $json1);
        Session::set('user', $json2);

        return view('layouts.EnsLayouts.EnseignantLayout');
    }

}

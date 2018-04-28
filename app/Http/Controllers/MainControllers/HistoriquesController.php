<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HistoriquesController extends Controller
{
    public function getHisto()
    {

        $auth_id = Auth::user()->id;
        $data_histo = \App\Historique::where('idenseignant', $auth_id)->with("ue", "enseignant", "session")->get();

        $top_menu_selected = 1;
        return view('layouts/EnsLayouts/histoEns', compact('top_menu_selected', 'data_histo'));
    }

}
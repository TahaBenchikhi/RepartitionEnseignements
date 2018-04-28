<?php

namespace App\Http\Controllers\MainControllers;

use App\Commentaire;
use App\Http\Controllers\Controller;
use App\Repartition;
use App\Ue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoeuxController extends Controller
{
    public function getView()
    {
        $user = \App\Enseignant::find(Auth::user()->id);

        $historiques = \App\Enseignant::with('historique.ue')->where('id', '=', Auth::user()->id)->get();

        if (!empty($historiques->first())) $histo = $historiques[0]->historique;
        $data = \App\Ue::get();
        $top_menu_selected = 2;
        $cm = \App\Repartition::with("ue")->where('idenseignant', Auth::user()->id)->where("type", "CM")->get();
        $cour = \App\Repartition::with("ue")->where('idenseignant', Auth::user()->id)->where("type", "cours")->get();
        $td = \App\Repartition::with("ue")->where('idenseignant', Auth::user()->id)->where("type", "TD")->get();
        $tp = \App\Repartition::with("ue")->where('idenseignant', Auth::user()->id)->where("type", "TP")->get();
        $formation = \App\Repartition::with("ue")->where('idenseignant', Auth::user()->id)->where("type", "formation")->get();
        $stage = \App\Repartition::with("ue")->where('idenseignant', Auth::user()->id)->where("type", "stage")->get();


        return view('layouts.EnsLayouts.EnseignantChoicesLayout', compact('top_menu_selected', 'data', 'histo', 'user', 'cm', 'cour', 'tp', 'td','formation','stage'));
    }


    public function getAndSet()
    {
        $user = \App\Enseignant::find(Auth::user()->id);
        $cnt = \App\Commentaire::where('idvoeu', Auth::user()->id)->count();
        if ($cnt) {
            $deleteOne = \App\Commentaire::where('idvoeu', Auth::user()->id);
            $deleteOne->forceDelete();
            $deletTwo = \App\Repartition::where('idenseignant', Auth::user()->id);
            $deletTwo->forceDelete();
        }
        $historiques = \App\Enseignant::with('historique.ue')->where('id', '=', Auth::user()->id)->get();

        if (!empty($historiques->first())) $histo = $historiques[0]->historique;
        $choices = request('CM');
        if ($choices)
            foreach ($choices as $choice) {
                $repartition = new Repartition;
                $ue = \App\Ue::with('repartition')->get()->find(Ue::where('id', $choice)->first());
                $repartition->idue = $ue->id;
                $repartition->idenseignant = Auth::user()->id;
                $repartition->date = date('Y-m-d');
                $repartition->type = "CM";
                $repartition->idsession = \App\Session::where('annee_universitaire', 'like', date('Y'))->get()[0]->id;
                $repartition->save();
            }

        $choices = request('cours');
        if ($choices)
            foreach ($choices as $choice) {
                $repartition = new Repartition;
                $ue = \App\Ue::with('repartition')->get()->find(Ue::where('id', $choice)->first());
                $repartition->idue = $ue->id;
                $repartition->idenseignant = Auth::user()->id;
                $repartition->date = date('Y-m-d');
                $repartition->type = "cours";
                $repartition->idsession = \App\Session::where('annee_universitaire', 'like', date('Y'))->get()[0]->id;
                $repartition->save();
            }

        $choices = request('TD');
        if ($choices)
            foreach ($choices as $choice) {
                $repartition = new Repartition;
                $ue = \App\Ue::with('repartition')->get()->find(Ue::where('id', $choice)->first());
                $repartition->idue = $ue->id;
                $repartition->idenseignant = Auth::user()->id;
                $repartition->date = date('Y-m-d');
                $repartition->type = "TD";
                $repartition->idsession = \App\Session::where('annee_universitaire', 'like', date('Y'))->get()[0]->id;
                $repartition->save();
            }

        $choices = request('TP');
        if ($choices)
            foreach ($choices as $choice) {
                $repartition = new Repartition;
                $ue = \App\Ue::with('repartition')->get()->find(Ue::where('id', $choice)->first());
                $repartition->idue = $ue->id;
                $repartition->idenseignant = Auth::user()->id;
                $repartition->date = date('Y-m-d');
                $repartition->type = "TP";
                $repartition->idsession = \App\Session::where('annee_universitaire', 'like', date('Y'))->get()[0]->id;
                $repartition->save();
            }
        $choices = request('stage');
        if ($choices)
            foreach ($choices as $choice) {
                $repartition = new Repartition;
                $ue = \App\Ue::with('repartition')->get()->find(Ue::where('id', $choice)->first());
                $repartition->idue = $ue->id;
                $repartition->idenseignant = Auth::user()->id;
                $repartition->date = date('Y-m-d');
                $repartition->type = "stage";
                $repartition->idsession = \App\Session::where('annee_universitaire', 'like', date('Y'))->get()[0]->id;
                $repartition->save();
            }
        $choices = request('formation');
        if ($choices)
            foreach ($choices as $choice) {
                $repartition = new Repartition;
                $ue = \App\Ue::with('repartition')->get()->find(Ue::where('id', $choice)->first());
                $repartition->idue = $ue->id;
                $repartition->idenseignant = Auth::user()->id;
                $repartition->date = date('Y-m-d');
                $repartition->type = "formation";
                $repartition->idsession = \App\Session::where('annee_universitaire', 'like', date('Y'))->get()[0]->id;
                $repartition->save();
            }
        $com = request('commentaire');
        $commentaire = new Commentaire;
        $commentaire->idvoeu = Auth::user()->id;
        $commentaire->commentaire = $com;
        $commentaire->save();

        $data = DB::table('ues')->get();
        $top_menu_selected = 2;

        return redirect('/Voeux');
    }

}

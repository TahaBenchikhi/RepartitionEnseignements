<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UEController extends Controller
{
    /*
    /-----------------------------------------------------------------------------
    /  functions that allows administator and teacher to get courses list
    /-----------------------------------------------------------------------------
    */

    public function Get_list_to_Ens()
    {
        $top_menu_selected = 3;

        $data = \App\Ue::get();

        return view('layouts/EnsLayouts/UE/listeUEEnsLayout', compact('top_menu_selected', 'data'));
    }


    public function Get_list_to_Rep()
    {
        $top_menu_selected = 3;

        $data = \App\Ue::get();

        return view('layouts/RepLayouts/UE/listeUERepLayout', compact('top_menu_selected', 'data'));
    }


    public function Get_UE_to_Ens($idue)
    {
        $top_menu_selected = 3;
        $data = \App\Ue::where('id', $idue)->get();
        $historique = \App\Historique::where('idue', $idue)->with("ue", "enseignant", "session")->get();
        $repartition = \App\Repartition::where('idue', $idue)->with("ue", "enseignant", "session")->get();
        $data = \App\Ue::where('id', $idue)->get();


        return view('layouts/EnsLayouts/UE/ficheUEEnsLayout', compact('top_menu_selected', 'data', 'historique', 'repartition'));
    }


    public function Delete_ue(Request $request)
    {
        $ue = \App\Ue::find($request->id);
        $ue->delete();
    }


    public function Get_UE_to_Rep($idue)
    {
        $top_menu_selected = 3;
        $data = \App\Ue::where('id', $idue)->get();
        $historique = \App\Historique::where('idue', $idue)->with("ue", "enseignant", "session")->get();
        $repartition = \App\Repartition::where('idue', $idue)->with("ue", "enseignant", "session")->get();

        return view('layouts/RepLayouts/UE/ficheUERepLayout', compact('top_menu_selected', 'data', 'historique', 'repartition'));
    }


    public function Modify_FicheUE(Request $data)
    {

        $ue = \App\Ue::find($data->id);
        $ue->semestre = $data->semestre;
        $ue->codeue = $data->codeue;
        $ue->nbheuresTD = $data->nbheuresTD;
        $ue->nbheuresCour = $data->nbheuresCour;
        $ue->nbheuresTP = $data->nbheuresTP;
        $ue->nbheuresCM = $data->nbheuresCM;
        $ue->nbheuresEStage = $data->nbheuresEStage;
        $ue->nbheuresAFormation = $data->nbheuresAFormation;
        $ue->libellelong = $data->libellelong;
        $ue->groupe = $data->groupe;
        $ue->libellecourt = $data->libellecourt;
        $ue->composante = $data->composante;
        $ue->departement = $data->departement;
        $ue->save();
        $test = \App\Ue::where('id', $data->id)->get()[0]->commentaireue;
        if (!$test) {
            $commentaire = new \App\CommentaireUE();
            $commentaire->idue = $data->id;
            $commentaire->commentaire = $data->commentaire;
            $commentaire->save();
        } else {
            $commentaire = $test;
            $commentaire->idue = $data->id;
            $commentaire->commentaire = $data->commentaire;
            $commentaire->save();
        }


    }


    public function Get_ajout_view()
    {
        $coeff = \App\Conversion::get();
        return view('layouts/RepLayouts/UE/ajoutUe', compact('coeff'));

    }


    public function Add_UE(Request $data)
    {
        $ue = new \App\Ue();
        $ue->semestre = $data->semestre;
        $ue->codeue = $data->codeue;
        $ue->nbheuresTD = $data->nbheuresTD;
        $ue->nbheuresCour = $data->nbheuresCour;
        $ue->nbheuresTP = $data->nbheuresTP;
        $ue->nbheuresCM = $data->nbheuresCM;
        $ue->nbheuresEStage = $data->nbheuresStage;
        $ue->nbheuresAFormation = $data->nbheuresFormation;
        $ue->groupe = $data->groupe;
        $ue->libellelong = $data->libellelong;
        $ue->libellecourt = $data->libellecourt;
        $ue->composante = $data->composante;
        $ue->departement = $data->departement;
        $ue->save();


    }

}


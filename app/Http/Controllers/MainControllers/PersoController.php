<?php


namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersoController extends Controller
{
    /*
    /-----------------------------------------------------------------------------
    /  functions that allows administator and teacher to get teachers list
    /-----------------------------------------------------------------------------
    */

    public function Get_list_to_Ens()
    {
        $top_menu_selected = 3;

        $data = \App\Enseignant::get();

        return view('layouts/EnsLayouts/Perso/listePersoEnsLayout', compact('top_menu_selected', 'data'));
    }


    public function Get_list_to_Rep()
    {
        $top_menu_selected = 3;

        $data = \App\Enseignant::get();

        return view('layouts/RepLayouts/Perso/listePersoRepLayout', compact('top_menu_selected', 'data'));
    }


    public function Get_perso_to_Ens($enseignantid)
    {
        $top_menu_selected = 3;
        $data = \App\Enseignant::where('id', $enseignantid)->get();
        $historique = \App\Historique::where('idenseignant', $enseignantid)->with("ue", "enseignant", "session")->get();
        $repartition = \App\Repartition::where('idenseignant', $enseignantid)->with("ue", "enseignant", "session")->get();

        return view('layouts/EnsLayouts/Perso/fichePersoEnsLayout', compact('top_menu_selected', 'data', 'repartition', 'historique'));
    }


    public function Get_perso_to_Rep($enseignantid)
    {
        $top_menu_selected = 3;

        $data = \App\Enseignant::where('id', $enseignantid)->get();
        $historique = \App\Historique::where('idenseignant', $enseignantid)->with("ue", "enseignant", "session")->get();
        $repartition = \App\Repartition::where('idenseignant', $enseignantid)->with("ue", "enseignant", "session")->get();

        return view('layouts/RepLayouts/Perso/fichePersoRepLayout', compact('top_menu_selected', 'data', 'repartition', 'historique'));
    }


    public function Modify_FichePerso(Request $data)
    {

        $enseignant = \App\Enseignant::find($data->id);
        $enseignant->nom = $data->nom;
        $enseignant->HTDstat = $data->HTDstat;
        $enseignant->HTDdues = $data->HTDdues;
        $enseignant->HTDattrib = $data->HTDattrib;
        $enseignant->delta = $data->delta;
        $enseignant->PRP = $data->PRP;
        $enseignant->departement = $data->departement;
        $enseignant->composante = $data->composante;
        $enseignant->corps = $data->corps;
        $enseignant->type = $data->type;
        $enseignant->save();


        $test = \App\Enseignant::where('id', $data->id)->get()[0]->commentaireens;
        if (!$test) {
            $commentaire = new \App\CommentaireEnseignant();
            $commentaire->idenseignant = $data->id;
            $commentaire->commentaire = $data->commentaire;
            $commentaire->save();
        } else {
            $commentaire = $test;
            $commentaire->idenseignant = $data->id;
            $commentaire->commentaire = $data->commentaire;
            $commentaire->save();
        }


    }


    public function Delete_ens(Request $request)
    {
        $ens = \App\Enseignant::find($request->id);
        \App\Message::where('expediteur',$request->id)->delete();
        $ens->delete();
    }


    public function Get_ajoutens_view()
    {

        return view('layouts/RepLayouts/Perso/ajoutEnseignant');

    }


    public function Add_Ens(Request $data)
    {
        $ens = new \App\Enseignant();
        $ens->nom = $data->nom;
        $ens->HTDstat = $data->HTDstat;
        $ens->HTDdues = $data->HTDdues;
        $ens->HTDattrib = $data->HTDattrib;
        $ens->delta = $data->delta;
        $ens->PRP = $data->PRP;
        $ens->departement = $data->departement;
        $ens->composante = $data->composante;
        $ens->corps = $data->corps;
        $ens->type = $data->type;
        $ens->save();
        $user = new \App\User();
        $user->id = $ens->id;
        $user->idenseignant = $ens->id;
        $user->email = $data->email;
        $user->password = 'dsddsd';
        $user->type = 'enseignant';
        $user->save();


    }

}

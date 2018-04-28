<?php

namespace App\Http\Controllers\MainControllers;


use App\Historique;
use App\Http\Controllers\Controller;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RepartitionController extends Controller
{
    public function Get_repartition_data()
    {
        $top_menu_selected = 2;
        
        $data = DB::select('select (select count(*) from repartitions where idue = v.idue) as cnt,v.id,u.codeue,u.id as ueid,e.id as ensid,e.nom,e.HTDstat,e.HTDdues,e.HTDattrib,e.delta,e.PRP,e.departement,e.composante,e.corps,e.type,v.type as type2,v.decision from enseignants e , repartitions v ,ues u WHERE e.id = v.idenseignant and u.id = v.idue');

        return view('layouts/RepLayouts.RepartiteurRepartition', compact("top_menu_selected", "data"));
    }

    public function Reset_reparition_table()
    {
        DB::update('update repartitions set decision = "Normal" where 1');

    }

    public function Get_commentaire(Request $request)
    {
        $value = $request->all();

        $data = \App\Repartition::with('commentaire')->get()->find($value['Value'])->commentaire;
        echo $data->commentaire;
    }

    public function Data_Start_Session()
    {
        return view('layouts/RepLayouts.StartSession');

    }


    public function Start_Session(Mailer $mailer, Request $request)
    {
        $check = \App\Session::where('annee_universitaire', date("Y"))->get();
        if (empty($check->first())) {
            $session = new \App\Session();
            $session->datedebut = $request->debut;
            $session->datefin = $request->fin;
            $session->annee_universitaire = date("Y");
            $session->save();
        } else {
            $check->first()->datedebut = $request->debut;
            $check->first()->datefin = $request->fin;
            $check->first()->save();
        }


        $faker = Faker::create();

        $data = \App\User::where('id', '!=', Auth::user()->id)->get();
        foreach ($data as $datas) {
            $newpassword = $faker->password(8,10);
            $user = User::find($datas->id);
            $user->password = bcrypt($newpassword);
            $user->save();

            $mailer->to($datas->email)
                ->send(new \App\Mail\Mails(["titre" => $request->titre, "contenu" => $request->contenu , "password" =>$newpassword,"login"=>$datas->email ]));

        }

    }

    public function Stop_Session()
    {

        $id = \App\Session::where('annee_universitaire', date("Y"))->get();
        $id[0]->datefin = date("Y-m-d");
        $id[0]->save();
        $Delete = \App\Historique::where('idsession', $id[0]->id);
        $Delete->delete();
        /***************************************/
        $data = \App\Repartition::where('decision', 'Accepted')->get();
        foreach ($data as $datas) {
            $Historique = new Historique;
            $Historique->idenseignant = $datas->idenseignant;
            $Historique->idue = $datas->idue;
            $Historique->idsession = $datas->idsession;
            $Historique->type = $datas->type;
            $Historique->save();
        }

    }
}

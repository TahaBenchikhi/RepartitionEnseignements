<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{

    public function Update_repartition(Request $request)
    {

        $data = $request->all();
        if ($data) {
            foreach ($data["Data"] as $key => $value) {
                $repar = \App\Repartition::find($key);
                $repar->decision = $value;
                $repar->save();
            }
        }


    }

    public function Check_messages(Request $request)
    {
        $data = \App\Enseignant::with('message')->get()->find(Auth::user()->id)->message->where('vu', '0')->where('supprimer', '0')->count();

        Session::set('messages', $data);

        return $data;


    }

    public function getidofue(Request $request)
    {
        $id = \App\Ue::where("codeue", $request->id)->get();
        echo $id[0]->id;
    }


}

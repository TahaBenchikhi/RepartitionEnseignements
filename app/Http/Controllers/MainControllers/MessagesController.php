<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller
{
    public function Get_messages()
    {
        $top_menu_selected = 5;

        $reception = \App\Enseignant::with('message.enseignant')->get()->find(Auth::user()->id);
        if ($reception) $reception = $reception->message->where('supprimer', '0');

        if (!empty(\App\Enseignant::with('message')->get()->first())) Session::set('messages', \App\Enseignant::with('message')->get()->find(Auth::user()->id)->message->where('vu', '0')->where('supprimer', '0')->count());

        $removed = \App\Enseignant::with('message')->get()->find(Auth::user()->id);
        if ($removed) $removed = $removed->message->where('supprimer', '1');
        $sended = \App\Message::where('expediteur', Auth::user()->id)->get();

        $emails = \App\User::where('id', '!=', Auth::user()->id)->get();


        return view('layouts/RepLayouts.Message', compact("top_menu_selected", "reception", "removed", "sended", "emails"));

    }

    public function Update_Status(Request $request)
    {
        $request = (Object)$request->all();
        $sess = Session::get('messages');
        Session::set('messages', $sess - 1);
        $data = \App\Enseignant::with('message')->get()->find(Auth::user()->id)->message->where('id', $request->id);
        if ($request->action == "vu") $data->first()->vu = 1;
        if ($request->action == "delete") $data->first()->supprimer = 1;

        \App\Enseignant::find(Auth::user()->id)->message()->save($data->first());
    }

    public function Envoi_Message(Request $request)
    {

        if ($request->destinataire) {
            foreach ($request->destinataire as $element) {
                $this->Write_Message($request, $element);
            }
        } else {
            $data = \App\User::where('id', '!=', Auth::user()->id)->get();
            foreach ($data as $datas) {
                $this->Write_Message($request, $datas->id);
            }

        }


    }

    public function Write_Message($request, $element)
    {
        $message = new \App\Message;
        $message->destinataire = $element;
        $message->expediteur = Auth::user()->id;
        $message->contenu = $request->message;
        $message->sujet = $request->sujet;
        $message->date = date("Y-m-d H:i:s", strtotime('+1 hours'));
        $message->supprimer = 0;
        $message->vu = 0;
        $message->valid = 0;

        \App\Enseignant::with("message")->find($element)->message()->save($message);
    }

    public function Envoi_Message_Extern(Mailer $mailer, Request $request)
    {
        if (request('destinataire')) {
            foreach (request('destinataire') as $element) {
                $mailer->to(\App\User::find($element)->email)->send(new \App\Mail\Mails(["titre" => $request->sujet, "contenu" => $request->message]));
            }
        } else {
            $data = \App\User::where('id', '!=', Auth::user()->id)->get();
            foreach ($data as $datas) {
                $mailer->to($datas->email)->send(new \App\Mail\Mails(["titre" => $request->sujet, "contenu" => $request->message]));
            }

        }

    }

}

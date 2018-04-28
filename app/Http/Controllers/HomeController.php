<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Session::get('type') == 'enseignant') {

            return app('App\Http\Controllers\MainControllers\Enseignant')->getView();

        } else if (Session::get('type') == 'repartiteur') {

            return app('App\Http\Controllers\MainControllers\Repartiteur')->getView();
        }

    }

    public function change()
    {
        if (!Auth::guest() && Session::get('type') != 'enseignant' && Session::get('goback') == 0) {

            session(['goback' => 1, 'type' => 'enseignant']);

        } else if (Session::get('goback') == 1) {

            session(['goback' => 0, 'type' => 'repartiteur']);

        }

        return redirect('/');
    }

}

<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Repartiteur extends Controller
{
    public function getView()
    {
        $data = DB::table('users')->where('id', 2)->get();

        return view('layouts.RepLayouts.RepartiteurLayout');
    }


}

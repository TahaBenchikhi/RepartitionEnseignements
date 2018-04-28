<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ProfilController extends Controller
{
    public function getprofil()
    {
        $auth_id = Auth::user()->id;

        $data = \App\Enseignant::with('user.enseignant')->where('id', '=', $auth_id)->get();
        $data2 = \App\User::with('enseignant.user')->where('id', '=', $auth_id)->get();

        $repartition = \App\Repartition::where('idenseignant', $auth_id)->where('decision', 'Normal')->with("ue", "enseignant", "session")->get();
        $attribuer = \App\Repartition::where('idenseignant', $auth_id)->where('decision', 'Accepted')->with("ue", "enseignant", "session")->get();


        $top_menu_selected = 1;

        return view('layouts/EnsLayouts/profilEns', compact('top_menu_selected', 'data', 'data2', 'repartition', 'attribuer'));
    }


    public function updatePassword(Request $request)
    {
        $request = (Object) $request;
        if(Auth::Check())
        {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            }
            else
            {
                $current_password = Auth::User()->password;
                if(Hash::check($request_data['current-password'], $current_password))
                {
                    $user_id = Auth::User()->id;
                    $obj_user =  \App\User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save();
                    return "ok";
                }
                else
                {
                    $error = array('current-password' => 'Please enter correct current password');
                    return response()->json(array('error' => $error), 400);
                }
            }
        }
        else
        {
            return redirect()->to('/');
        }


    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
    }


}

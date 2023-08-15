<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class AuthController extends Controller
{
    public function createUser(Request $req){

        $datas = $req->validate([
            "nom" => ["required","string","min:3","max:100"],
            "prenom" => ["required","string","min:3","max:120"],
            "email" => ["required","string","min:3","max:150"],
            "acces" => ["required","string"],
            "actions" => ["required","string"],
            "password" => ["required","string"],
            "isActive" => ["required","boolean"]
        ]);
        $user = User::create([
            "nom" => $datas["nom"],
            "prenom" => $datas["prenom"],
            "email" => $datas["email"],
            "acces" => $datas["acces"],
            "actions" => $datas["actions"],
            "password" => Hash::make($datas["password"]),
            "isActive" => $datas["isActive"],
        ]);
//        $user->save();
        return response($user,201);
    }
    public function login(Request $req)
    {
        $datas = $req->validate([
            "email" => ["required","string","min:3","max:150"],
            "password" => ["required","string"]
        ]);

        if(Auth::attempt($datas)){
            return Auth::user();
        }else{
            return ["message : " => "Email ou mot de passe incorrecte"];
        }
    }
}

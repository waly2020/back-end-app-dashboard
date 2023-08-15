<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public  function getUsers(Request $req,$id){
        return User::all()->where("id","!=",$id);
    }
    public function deleteUser($id){
//        error_log("id : " . $req->all()[0]);
        $user = User::find($id);
        $user->delete();
        return ["statut" => "L'utilisateur a bien ete supprimer"];
    }

    public function getUser($id) : User{

        return User::find($id);
    }
}

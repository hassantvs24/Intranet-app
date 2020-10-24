<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Group;

class InvitationController extends Controller
{
    public function invite(Request $request)
    {

        //$groups = Group::all();
        $name =  base64_decode($request->query('user'));
        $email =  base64_decode($request->query('email'));
        $group = base64_decode($request->query('group'));
        $admin = base64_decode($request->query('admin'));//primary_contact

        $user = User::where('email', $email)->count();
        if($user > 0){
            return 'Link Already Used';
        }else{
           // dd([$name,$email,$group,$admin]);
            return view('backend.users.invitation')->with(['group_id' => $group, 'primary_contact' =>$admin, 'email' => $email, 'name' => $name]);
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class InvitationController extends Controller
{
    public function invite(Request $request)
    {
        $groups = Group::all();
        $email =  base64_decode($request->query('user'));
        $group = base64_decode($request->query('group'));
        return view('backend.users.invitation', compact('groups', 'email', 'group'));
    }
}

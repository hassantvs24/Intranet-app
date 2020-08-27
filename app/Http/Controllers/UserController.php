<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(15);
        // $someUsers = User::where('archived', '=', 0)->paginate(15);
        return view('backend.users.index', compact('users'));
    }

    public function archived()
    {
        return view('backend.users.archive');
    }

    public function create()
    {
        $groups = Group::all();
        return view('backend.users.create', compact('groups'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.view', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $groups = Group::all();
        return view('backend.users.edit', compact('user', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->save();
        return redirect()->route('all-users')
            ->with('success', 'Admin updated successfully');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('all-users')
            ->with('success', 'Admin deleted successfully');
    }

    public function account_settings()
    {
        return view('backend.users.account-settings');
    }
}

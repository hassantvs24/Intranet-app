<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.users.index');
    }

    public function archived()
    {
        return view('backend.users.archive');
    }

    public function create()
    {
        $groups = Group::all();
        return view('backend.users.create',compact('groups'));
    }

    public function store(Request $request)
    {
        //
    }

//    public function show($id)
    public function show()
    {
        return view('backend.users.view');
    }

//    public function edit($id)
    public function edit()
    {
        return view('backend.users.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    
    public function account_settings()
    {
        return view('backend.users.account-settings');
    }
}

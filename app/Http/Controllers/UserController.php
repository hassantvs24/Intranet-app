<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.users.users-index');
    }

    public function archived()
    {
        return view('backend.users.users-archive');
    }

    public function create()
    {
        return view('backend.users.users-create');
    }

    public function store(Request $request)
    {
        //
    }

//    public function show($id)
    public function show()
    {
        return view('backend.users.users-view');
    }

//    public function edit($id)
    public function edit()
    {
        return view('backend.users.users-edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

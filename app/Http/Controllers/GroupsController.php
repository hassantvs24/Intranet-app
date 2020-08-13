<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('backend.dashboard');
    }

    public function index()
    {
        return view('backend.groups.group-index');
    }

    public function archived()
    {
        return view('backend.groups.group-archive');
    }

    public function create()
    {
        return view('backend.groups.group-create');
    }

    public function store(Request $request)
    {
        //
    }

//    public function show($id)
    public function show()
    {
        return view('backend.groups.group-view');
    }

//    public function edit($id)
    public function edit()
    {
        return view('backend.groups.group-edit');
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

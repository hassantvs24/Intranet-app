<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardsController extends Controller
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
        return view('backend.groups.index');
    }

    public function archived()
    {
        return view('backend.groups.archive');
    }

    public function create()
    {
        return view('backend.groups.create');
    }

    public function store(Request $request)
    {
        //
    }

//    public function show($id)
    public function show()
    {
        return view('backend.groups.view');
    }

//    public function edit($id)
    public function edit()
    {
        return view('backend.groups.edit');
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

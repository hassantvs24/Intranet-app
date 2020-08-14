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
        return view('backend.boards.index');
    }

    public function archived()
    {
        return view('backend.boards.archive');
    }

    public function create()
    {
        return view('backend.boards.create');
    }

    public function store(Request $request)
    {
        //
    }

//    public function show($id)
    public function show()
    {
        return view('backend.boards.view');
    }

//    public function edit($id)
    public function edit()
    {
        return view('backend.boards.edit');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group as Group;

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
        $groups = Group::all();
        return view('backend.boards.create',compact('groups'));
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

    public function info_cards()
    {
        return view('backend.boards.infocards');
    }
}

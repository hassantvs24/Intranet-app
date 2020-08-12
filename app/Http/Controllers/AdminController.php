<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        return view('admin.group-index');
    }

    public function archived()
    {
        return view('admin.group-archive');
    }

    public function create()
    {
        return view('admin.group-create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('admin.group-view');
    }

//    public function edit($id)
    public function edit()
    {
        return view('admin.group-edit');
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

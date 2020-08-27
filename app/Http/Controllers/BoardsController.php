<?php

namespace App\Http\Controllers;

use App\Board;
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
        $boards = Board::paginate(15);
        // $group_name = Group::find()
        return view('backend.boards.index', compact('boards'));
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
        Board::create([
            'name' => $request['name'],
            'group_id' => $request['user_group']
        ]);
        return redirect()->route('all-boards')
            ->with('success', 'Board added successfully');
    }

    public function show($id)
    {
        $board = Board::find($id);
        return view('backend.boards.view', compact('board'));
    }

    public function edit($id)
    {
        $board = Board::find($id);
        return view('backend.boards.edit', compact('board'));
    }

    public function update(Request $request, $id)
    {
        $board = Board::find($id);
        $board->name = $request->name;
        $board->save();
        return redirect()->route('all-boards')
            ->with('success', 'Board updated successfully');
    }

    public function destroy($id)
    {
        //
    }

    public function info_cards($id)
    {
        return view('backend.boards.infocards', compact('board_id'));
    }
}

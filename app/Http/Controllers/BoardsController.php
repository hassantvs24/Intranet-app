<?php

namespace App\Http\Controllers;

use App\Board;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Group as Group;
use Illuminate\Support\Str;

class BoardsController extends Controller
{
    use UploadTrait;

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
        $boards = Board::active(true)->paginate(15);
        // $group_name = Group::find()
        return view('backend.boards.index', compact('boards'));
    }

    public function archived()
    {
        $boards = Board::active(false)->paginate(15);
        return view('backend.boards.archive', compact('boards'));
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
        return redirect()->route('all-boards', app()->getLocale() )
            ->with('success', 'Board added successfully');
    }

    public function show($language,$id)
    {
        $board = Board::find($id);
        return view('backend.boards.view', compact('board'));
    }

    public function edit( $language, $id )
    {
        $board = Board::find($id);
        return view('backend.boards.edit', compact('board'));
    }

    public function update(Request $request, $language, $id)
    {
        $board = Board::find($id);
        $board->name = $request->name;
        $board->save();
        return redirect()->route( 'all-boards', app()->getLocale() )
            ->with('success', 'Board updated successfully');
    }

    public function destroy( $language, $id )
    {
        $board = Board::find( $id );
        $board->events()->delete();
        $board->cards()->delete();
        $board->delete();
        return redirect()->route( 'all-boards', app()->getLocale() )->with('success', 'Board deleted!');
    }

    public function info_cards( $language, $id )
    {
        $board_id = $id;
        return view('backend.boards.infocards', compact('board_id'));
    }

    public function search( Request $request ) {
        $search = $request->get('search');
        $boards = Board::active(true)->where('name','like', '%'.$search.'%')->paginate(15);
        return view('backend.boards.index', compact('boards'));
    }

    public function searchArchive( Request $request ) {
        $search = $request->get('search');
        $boards = Board::active(false)->where('name','like', '%'.$search.'%')->paginate(15);
        return view('backend.boards.index', compact('boards'));
    }

    public function info_card_file_upload(Request $request){
        if ($request->has('file')) {
            // Get image file
            $myFile = $request->file('file');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($myFile->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = '/uploads/files/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            //$fileName = $name . '.' . $myFile->getClientOriginalExtension();
            $filePath = $folder . $name . '.' . $myFile->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($myFile, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            return response()->json(["status" => true,"filename" => $filePath]) ;
        }

        return response()->json(["status" => false]) ;
    }
}

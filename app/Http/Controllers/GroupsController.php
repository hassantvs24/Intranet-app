<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\GroupAdmin as Admin;
use App\Group as Group;
use Illuminate\Support\Facades\App;

class GroupsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function home()
    {

        // dd('haha');
        // get group, users, admins count
        $total_groups = count(Group::all());
        $total_users = count(User::all());
        $total_admins = count(Admin::all());
//        return dd($total_groups, $total_users, $total_admins);
        return view('backend.dashboard', compact('total_groups','total_users', 'total_admins'));
    }

    public function index()
    {
        $groups = Group::active(true)->paginate(15);
        return view('backend.groups.index', compact('groups'));
    }

    public function archived()
    {
        $groups = Group::active(false)->paginate(15);
        return view('backend.groups.archive', compact('groups'));
    }

    public function create()
    {
        $admins = Admin::all();
        return view('backend.groups.create', compact('admins'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $group = new Group();
        $group->name = $request->name;
        $group->color = $request->group_color;
        $group->start_date = $request->start_date;
        $group->end_date = $request->end_date;

        if( isset( $request->archive_start_date ) ) {
            $group->archive_start_date = $request->archive_start_date;
        }

        if( isset( $request->archive_end_date ) ) {
            $group->archive_end_date = $request->archive_end_date;
        }

        $group->save();
        $group->admins($group->id)->attach($request->group_admins);
        $group->save();
        return redirect(route('all-groups', app()->getLocale() ))->with('status', 'Group successfully created!');
    }

    public function show($language,$id)
    {
        $group = Group::find($id);
        $users = $group->users;
        $gusers = User::whereNull('group_id')->get();
        return view('backend.groups.view',compact('group','users', 'gusers'));
    }

    public function edit( $language, $id)
    {
        $group = Group::find($id);
        $group_admins = array_column($group->admins->toArray(), 'id');
        $admins = Admin::all();
        return view('backend.groups.edit', compact('group', 'admins', 'group_admins'));
    }

    public function update( Request $request, $language, $id )
    {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->color = $request->group_color;
        $group->start_date = $request->start_date;
        $group->end_date = $request->end_date;
        $group->save();
        $group->admins($group->id)->sync($request->group_admins);
        return redirect(route('all-groups',app()->getLocale() ))->with('status', 'Board successfully updated!');
    }

    public function destroy( $language, $id )
    {
        $group = Group::find( $id );
    }

    public function search( Request $request ) {
        $search = $request->get('search');
        $groups = Group::active(true)->where('name','like', '%'.$search.'%')->paginate(15);
        return view('backend.groups.index', compact('groups'));
    }

    public function searchArchive( Request $request ) {
        $search = $request->get('search');
        $groups = Group::Active(false)->where('name','like', '%'.$search.'%')->paginate(15);
        return view('backend.groups.index', compact('groups'));
    }

    public function existinguser( Request $request ) {
        $user = User::find( $request->searchuser );
        $user->group_id = $request->group_ex_id;
        $user->save();

        return redirect()->route('view-group', [ app()->getLocale(), $request->group_ex_id ]);
    }
}

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
        $this->middleware('auth');
    }

    public function home()
    {
        // get group, users, admins count
        $total_groups = count(Group::all());
        $total_users = count(User::all());
        $total_admins = count(Admin::all());
//        return dd($total_groups, $total_users, $total_admins);
        return view('backend.dashboard', compact('total_groups', 'total_users', 'total_admins'));
    }

    public function index()
    {
        $groups = Group::all();
        return view('backend.groups.index', compact('groups'));
    }

    public function archived()
    {
        return view('backend.groups.archive');
    }

    public function create()
    {
        $admins = Admin::all();
        return view('backend.groups.create', compact('admins'));
    }

    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->name;
        $group->color = $request->group_color;
        $group->start_date = $request->start_date;
        $group->end_date = $request->end_date;
        $group->save();
        $group->admins($group->id)->attach($request->group_admins);
        $group->save();
        return redirect(route('all-groups'))->with('status', 'Group successfully created!');
    }

    public function show($id)
    {
        $group = Group::find($id);
        $users = $group->users;
        return view('backend.groups.view',compact('group','users'));
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $group_admins = array_column($group->admins->toArray(), 'id');
        $admins = Admin::all();
        return view('backend.groups.edit', compact('group', 'admins', 'group_admins'));
    }

    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->color = $request->group_color;
        $group->start_date = $request->start_date;
        $group->end_date = $request->end_date;
        $group->save();
        $group->admins($group->id)->sync($request->group_admins);
        return redirect(route('all-groups'))->with('status', 'Board successfully updated!');
    }

    public function destroy($id)
    {
        //
    }
}

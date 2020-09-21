<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('role', '=', 'user')->paginate(15);
        return view('backend.users.index', compact('users'));
    }

    public function archived()
    {
        $users = User::where('role', '=', 'user')->paginate(15);

        return view('backend.users.archive', compact( 'users' ));
    }

    public function create()
    {
        $groups = Group::all();
        return view('backend.users.create', compact('groups'));
    }


    public function store(Request $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'group_id' => $data['group_id'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('all-users', app()->getLocale() )
            ->with('success', 'User updated successfully');
    }

    public function show( $language, $id )
    {
        $user = User::find($id);
        return view('backend.users.view', compact('user'));
    }

    public function edit( $language, $id )
    {
        $user = User::find($id);
        $groups = Group::all();
        return view('backend.users.edit', compact('user', 'groups'));
    }

    public function update(Request $request, $language, $id )
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->save();
        return redirect()->route('all-users', app()->getLocale() )
            ->with('success', 'User updated successfully');
    }

    public function destroy($language,$id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('all-users', app()->getLocale() )
            ->with('success', 'User deleted successfully');
    }

    public function account_settings()
    {
        $user = auth()->user();
        return view('backend.users.account-settings', compact( 'user') );
    }

    public function update_account_settings( Request $request ) {
        $user = auth()->user();
        $user->name = $request->group_name;
        $user->email = $request->user_email;
        $user->phone = $request->user_phone_no;
        $user->bio = $request->user_bio;
        if( isset( $request->user_language ) ) {
            $user->language = $request->user_language;
            session()->put('language', $request->user_language );
            app()->setLocale( $request->user_language );
        }

        $user->save();

        return redirect()->route('user-account-settings', app()->getLocale() )->with('success', 'Settings updated successfully');
    }

    public function search( Request $request ) {
        $search = $request->get('search');
        $users = User::where('name','like', '%'.$search.'%')->paginate(15);

        return view('backend.users.index', compact('users'));
    }
}

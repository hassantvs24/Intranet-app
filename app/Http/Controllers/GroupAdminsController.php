<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupGroupAdmin;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\GroupAdmin;
use App\User;
use Illuminate\Support\Facades\Storage;

class GroupAdminsController extends Controller
{
    use UploadTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admins = GroupAdmin::active(true)->paginate(15);
        return view('backend.admins.index', compact('admins'));
    }

    public function archived()
    {
        $admins = GroupAdmin::active(false)->paginate(15);
        return view('backend.admins.archive', compact( 'admins' ) );
    }

    public function create()
    {
        $group = Group::orderBy('name')->get();
        $group_admin = GroupAdmin::select('users_id')->whereNotNull('users_id')->get()->toArray();
        $user = User::orderBy('name')->whereNotIn('id',$group_admin)->get(); //Filter user, which user not find in group admin table
        return view('backend.admins.create')->with(['user' => $user,  'group' => $group]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4|max:191',
            'phone' => 'required|string|min:10|max:20',
            'email' => 'required|email',
            'group_id' => 'required|array',
            'users_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try{
            $user = User::find($request->users_id); //Make User to admin
            $user->group_id = NULL;
            $user->role = 'admin';
            $user->save();

            $admin = new GroupAdmin();
            $admin->users_id = $request->users_id;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->bio = $request->bio;
            // Check if a profile image has been uploaded
            if ($request->has('avatar')) {
                // Get image file
                $image = $request->file('avatar');
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('name')) . '_' . time();
                // Define folder path
                $folder = '/uploads/images/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
                $admin->avatar = $filePath;
            }
            $admin->save();

            $group_admin_id = $admin->id;

            if(isset($request->group_id)){

                GroupGroupAdmin::where('group_admin_id', $group_admin_id)->delete(); // Remove old add before new update

                $group_ids = $request->group_id;
                foreach ($group_ids as $row){

                    $assign_admin = new GroupGroupAdmin();
                    $assign_admin->group_id = $row;
                    $assign_admin->group_admin_id = $group_admin_id;
                    $assign_admin->save();
                }

            }

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
            // dd($ex);
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }

        return redirect()->route('all-admins', app()->getLocale() )->with(['status' => 'Admin created successfully.']);
    }

    public function show( $language, $id )
    {
        $admin = GroupAdmin::find($id);
        return view('backend.admins.view', compact('admin'));
    }

    public function edit( $language,$id)
    {
        $admin = GroupAdmin::find($id);
        $group = Group::orderBy('name')->get();
        $group_admin = GroupAdmin::select('users_id')->whereNotNull('users_id')->get()->toArray();
        $user = User::orderBy('name')->whereNotIn('id',$group_admin)->get(); //Filter user, which user not find in group admin table

        return view('backend.admins.edit')->with(['admin' => $admin, 'user' => $user,  'group' => $group]);
    }

    public function update(Request $request, $language,$id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4|max:191',
            'phone' => 'required|string|min:10|max:20',
            'email' => 'required|email',
            'group_id' => 'required|array',
            'users_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try{


            $old_user_admin = GroupAdmin::find($id);
            $old_user_id = $old_user_admin->users_id;

            if($old_user_id != $request->users_id){
                $old_user = User::find($old_user_id); //Make admin to user if change old user of the admin
                $old_user->role = 'user';
                $old_user->save();

                $user = User::find($request->users_id); //Make user to admin if change old user of the admin
                $user->group_id = NULL;
                $user->role = 'admin';
                $user->save();
            }


            $admin = GroupAdmin::find($id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->bio = $request->bio;
            $admin->users_id = $request->users_id;

            // Check if a profile image has been uploaded
            if ($request->has('avatar')) {
                // Get image file
                $image = $request->file('avatar');
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('name')) . '_' . time();
                // Define folder path
                $folder = '/uploads/images/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
                $admin->avatar = $filePath;
            }

            $admin->save();

            $group_admin_id = $id;

            GroupGroupAdmin::where('group_admin_id', $group_admin_id)->delete(); // Remove old add before new update

            if(isset($request->group_id)) {

                $group_ids = $request->group_id;
                foreach ($group_ids as $row) {

                    $assign_admin = new GroupGroupAdmin();
                    $assign_admin->group_id = $row;
                    $assign_admin->group_admin_id = $group_admin_id;
                    $assign_admin->save();
                }
            }

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
            // dd($ex);
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }

        return redirect()->route('all-admins', app()->getLocale() )->with('success', 'Admin updated successfully');
    }

    public function destroy($language, $id)
    {
        GroupAdmin::findOrFail($id)->delete();

        return redirect()->route('all-admins', app()->getLocale() )
        ->with('success', 'Admin deleted successfully');
    }

    public function account_settings()
    {
        $user = auth()->user();
        return view('backend.admins.account-settings', compact( 'user' ) );
    }

    public function update_account_settings( Request $request ) {
        $user = auth()->user();

        // if ($request->hasFile('user_profile_image')) {
        //     if ($request->file('user_profile_image')->isValid()) {
        //         $name = time(). $request->user_profile_image->getClientOriginalName();
        //         $request->user_profile_image->storeAs('/public', $name );
        //         $url = Storage::url($name);
        //         $user->avatar = $url;
        //     }
        // }

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

        return redirect()->route('admin-account-settings', app()->getLocale() )->with('success', 'Settings updated successfully');
    }

    public function search( Request $request ) {
        $search = $request->get('search');
        $admins = GroupAdmin::active(true)->where('name','like', '%'.$search.'%')->paginate(15);

        return view('backend.admins.index', compact('admins'));
    }

    public function searchArchive( Request $request ) {
        $search = $request->get('search');
        $admins = GroupAdmin::active(false)->where('name','like', '%'.$search.'%')->paginate(15);

        return view('backend.admins.index', compact('admins'));
    }
}

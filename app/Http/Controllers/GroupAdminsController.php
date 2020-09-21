<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
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
        return view('backend.admins.create');
    }

    public function store(Request $request)
    {

        $admin = new GroupAdmin();
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
        return view('backend.admins.edit', compact('admin'));
    }

    public function update(Request $request, $language,$id)
    {
        $admin = GroupAdmin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->bio = $request->bio;
        $admin->save();
        return redirect()->route('all-admins', app()->getLocale() )
            ->with('success', 'Admin updated successfully');
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

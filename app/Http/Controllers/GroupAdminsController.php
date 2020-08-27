<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\GroupAdmin;

class GroupAdminsController extends Controller
{
    use UploadTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admins = GroupAdmin::all();
        return view('backend.admins.index', compact('admins'));
    }

    public function archived()
    {
        return view('backend.admins.archive');
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
        return redirect()->route('all-admins')->with(['status' => 'Admin created successfully.']);
    }

    public function show($id)
    {
        $admin = GroupAdmin::find($id);
        return view('backend.admins.view', compact('admin'));
    }

    public function edit($id)
    {
        $admin = GroupAdmin::find($id);
        return view('backend.admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = GroupAdmin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->bio = $request->bio;
        $admin->save();
        return redirect()->route('all-admins')
            ->with('success', 'Admin updated successfully');
    }

    public function destroy($id)
    {
        GroupAdmin::findOrFail($id)->delete();

        return redirect()->route('all-admins')
        ->with('success', 'Admin deleted successfully');
    }

    public function account_settings()
    {
        return view('backend.admins.account-settings');
    }
}

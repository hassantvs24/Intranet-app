<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\GroupAdmin as Admin;

class GroupAdminsController extends Controller
{
    use UploadTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admins = Admin::all();
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

        $admin = new Admin();
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
        return redirect()->back()->with(['status' => 'Admin created successfully.']);
    }

    //    public function show($id)
    public function show()
    {
        return view('backend.admins.view');
    }

    //    public function edit($id)
    public function edit()
    {
        return view('backend.admins.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function account_settings()
    {
        return view('backend.account-settings');
    }
}

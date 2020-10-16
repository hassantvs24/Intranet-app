<?php

namespace App\Http\Controllers;

use App\Board;
use App\Group;
use App\GroupAdmin;
use App\GroupGroupAdmin;
use App\Traits\UploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GroupCreateController extends Controller
{
    use UploadTrait;

    public function index(){
        return view('backend.creation.group_create');
    }

    public function save_group(Request $request){
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4|max:191',
            'group_color' => 'required|string',
            'start_date' => 'date|required',
            'end_date' => 'date|required',
            'archive_start_date' => 'date|required',
            'archive_end_date' => 'date|required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $table = new Group();
            $table->name = $request->name;
            $table->color = $request->group_color;
            $table->start_date = $request->start_date;
            $table->end_date = $request->end_date;

            if( isset( $request->archive_start_date ) ) {
                $table->archive_start_date = $request->archive_start_date;
            }

            if( isset( $request->archive_end_date ) ) {
                $table->archive_end_date = $request->archive_end_date;
            }

            $table->save();

        }catch (\Exception $ex) {
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
    }

    public function board(){
        $group = Group::orderBy('name')->get();
        return view('backend.creation.board_create')->with(['group' => $group]);
    }

    public function save_board(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'board_name' => 'required|string|min:4|max:191',
            'group_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

            $table = new Board();
            $table->name = $request->board_name;
            $table->group_id = $request->group_id;
            $table->save();

        }catch (\Exception $ex) {
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
    }

    public function admin(){
        $group = Group::orderBy('name')->get();
        $group_admin = GroupAdmin::select('users_id')->get()->toArray();
        $user = User::orderBy('name')->whereNotIn('id',$group_admin)->get();
        return view('backend.creation.admin_create')->with(['user' => $user, 'group' => $group]);
    }

    public function save_admin(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'admin_name' => 'required|string|min:4|max:191',
            'phone' => 'required|string|min:10|max:20',
            'email' => 'required|email',
            'group_id' => 'required|numeric',
            'users_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try{

            $table = new GroupAdmin();
            $table->users_id = $request->users_id;
            $table->name = $request->admin_name;
            $table->email = $request->email;
            $table->phone = $request->phone;
            $table->bio = $request->bio ?? '';

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
                $table->avatar = $filePath;
            }
            $table->save();

            $group_admin_id = $table->id;

            /**
             * Assign Group Admin
             */

            $assign_admin = new GroupGroupAdmin();
            $assign_admin->group_id = $request->group_id;
            $assign_admin->group_admin_id = $group_admin_id;
            $assign_admin->save();

            /**
             * /Assign Group Admin
             */
            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
           // dd($ex);
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
    }

    public function invite(){
        $group = Group::orderBy('name')->get();
        $invited_user = User::orderBy('name')->whereIn('role', ['admin','superadmin'])->get();
        $guest_user = User::whereNull('group_id')->orderBy('id', 'DESC')->get();
        return view('backend.creation.invitation')->with(['invited_user' => $invited_user, 'guest_user' => $guest_user, 'group' => $group]);
    }

    public function save_invite(Request $request){
       // dd($request->all());

        $validator = Validator::make($request->all(), [
            'group_id' => 'required|numeric',
            'users_id' => 'required|numeric',
            'invite_user_id' => 'sometimes|required|array',
            'invite_email' => 'sometimes|required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try{

            $group_id = $request->group_id;
            $users_id = $request->users_id;

            if (isset($request->invite_user_id)){
                $invite_user_id = $request->invite_user_id;

                foreach ($invite_user_id as $rows){
                    $user = User::find($rows);
                    $user->group_id = $group_id;
                    $user->save();
                }
            }

            if (isset($request->invite_email)){
                $invite_email = $request->invite_email;

                foreach ($invite_email as $row){
                    $link = "http://intranet-app.test/nor/invite?user=".base64_encode($row)."&group=". base64_encode($group_id)."&admin=". base64_encode($users_id);
                    $email_body = "Dear user please click this link ". $link ." to create account on Intranet air";

                    $data = [
                        'to' => $row,
                        'from' => 'ashikur@getonnet.agency',
                        'subject' => 'Please confirm your invitation',
                        'title' => 'Intranet air invitation',
                        "body"     => $email_body
                    ];
                    $this->toEmail = $row;

                    Mail::send('email.invitation', compact('data'), function ($message) {
                        $message->from('admin@intranet.air', 'Intraner Air');
                        $message->to($this->toEmail);
                    });
                }
            }

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
             dd($ex);
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
    }
}

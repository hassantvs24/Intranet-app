<?php

namespace App\Http\Controllers;

use App\Board;
use App\Group;
use App\GroupAdmin;
use App\GroupGroupAdmin;
use App\GroupUser;
use App\InviteQueue;
use App\Traits\UploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
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
            $group_id = $table->id;

            Session::put('select_group', $group_id);//Store Group ID in Session Data

        }catch (\Exception $ex) {
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->route('groups.board', app()->getLocale())->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
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
        return redirect()->route('groups.admin', app()->getLocale())->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
    }

    public function admin(){
        $group = Group::orderBy('name')->get();
        $group_admin = GroupAdmin::select('users_id')->whereNotNull('users_id')->get()->toArray();
        $user = User::orderBy('name')->whereNotIn('id',$group_admin)->get(); //Filter user, which user not find in group admin table
        return view('backend.creation.admin_create')->with(['user' => $user, 'group' => $group]);
    }

    public function save_admin(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'admin_name' => 'required|string|min:4|max:191',
            'phone' => 'required|string|min:10|max:20',
            'email' => 'required|email',
            //'group_id' => 'required|numeric',
            'users_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try{

            $user = User::find($request->users_id);
            $user->group_id = NULL;
            $user->role = 'admin';
            $user->save();

            Session::put('select_primary', $request->users_id);//Store Primary Contact User ID in Session Data

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

            if(isset($request->group_id)){
                $assign_admin = new GroupGroupAdmin();
                $assign_admin->group_id = $request->group_id;
                $assign_admin->group_admin_id = $group_admin_id;
                $assign_admin->save();
            }

            /**
             * /Assign Group Admin
             */
            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
           // dd($ex);
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->route('groups.admin-assign', app()->getLocale())->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
    }


    public function group_assign(){
        $group = Group::orderBy('name')->get();
        $admins = GroupAdmin::orderBy('name')->get();
        return view('backend.creation.assign_group')->with(['admins' => $admins, 'group' => $group]);
    }

    public function save_group_assign(Request $request){
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            'group_id' => 'required|numeric',
            'admin_id' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try{

            if (isset($request->admin_id)){
                $admin_id = $request->admin_id;

                foreach ($admin_id as $rows){
                    GroupGroupAdmin::firstOrCreate([
                        'group_id' => $request->group_id,
                        'group_admin_id' => $rows
                    ]);
                }
            }

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->route('groups.invite', app()->getLocale())->with(['status' => 'Created successfully.', 'alert' => 'alert-success']);
    }


    public function invite(){
        $group = Group::orderBy('name')->get();
        $invited_user = User::orderBy('name')->whereIn('role', ['admin','superadmin'])->get();//Filter primary contact who are admin or super admin
        $guest_user = User::whereNull('group_id')->where('role', 'user')->orderBy('id', 'DESC')->get();//User select which is not linkup with group
        return view('backend.creation.invitation')->with(['invited_user' => $invited_user, 'group' => $group, 'guest_user' => $guest_user,]);
    }

    public function save_invite(Request $request){
        if(isset($request->add_exist)){
            $validator = Validator::make($request->all(), [
                'existing_user' => 'required|array',
                'group_id' => 'required|numeric',
                'primary_contact' => 'required|numeric'
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'queue_value' => 'required|array'
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try{

            if (isset($request->add_exist)){
                $invite_user_id = $request->existing_user;

                foreach ($invite_user_id as $rows){
                    $user = User::find($rows);
                    $user->role = 'user';
                    $user->group_id = $request->group_id;
                    $user->primary_contact = $request->primary_contact;
                    $user->save();

                    GroupUser::firstOrCreate(['group_id' => $request->group_id, 'users_id' => $rows],['admin_id' => Auth::user()->id]); //Add to group table

                }
            }

            if (isset($request->add_queue)){
                $invites = $request->queue_value;

                foreach ($invites as $row){
                    $row_data = explode(", ",$row); // email, primary_contact, group, name
                    $email = $row_data[0];
                    $users_id = $row_data[1];
                    $group_id = $row_data[2];
                    $name = $row_data[3];
                    InviteQueue::firstOrCreate(['email' => $email],['group_id' => $group_id, 'name' => $name, 'primary_contact' => $users_id, 'creator_id' => Auth::user()->id]);
                }
            }

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Successfully updated.', 'alert' => 'alert-success']);
    }


    public function invitation_send(Request $request){
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            'send_email' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try{

            $url = "http://intrair8352.getonnet.dev"; //Base url

            if (isset($request->send_email)){
                $invites = $request->send_email;

                foreach ($invites as $id){
                    $table = InviteQueue::find($id);
                    $name = $table->name;
                    $email = $table->email;
                    $group = $table->group_id;
                    $p_contact = $table->primary_contact;

                    $link = $url."/nor/invite?user=".base64_encode($name)."&email=".base64_encode($email)."&group=". base64_encode($group)."&admin=". base64_encode($p_contact);
                    // $email_body = "Dear user please click this link ". $link ." to create account on Intranet air";

                    $data = [
                        'to' => $email,
                        'from' => 'ashikur@getonnet.agency',
                        'subject' => 'Please confirm your invitation',
                        'title' => 'Intranet air invitation',
                        'name' => $name,
                        "body"     => $link
                    ];
                    $this->toEmail = $email;

                    Mail::send('email.invitation', compact('data'), function ($message) {
                        $message->subject('Please confirm your invitation');
                        $message->from('velkomen@air.no', 'Intraner Air');
                        $message->to($this->toEmail);
                    });

                    $table->status = 'Invited';
                    $table->sender_id = Auth::user()->id;
                    $table->save();
                }
            }

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Successfully updated.', 'alert' => 'alert-success']);
    }


/*
    public function save_invite(Request $request){

        //dd($request->all());

        if(isset($request->add_exist)){
            $validator = Validator::make($request->all(), [
                'selected_user' => 'required|array',
                'group_id' => 'required|numeric',
                'primary_contact' => 'required|numeric'
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'queue_value' => 'required|array'
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try{

            if (isset($request->invite_email)){
                $invite_email = $request->invite_email;

                foreach ($invite_email as $row){

                    $row_data = explode(", ",$row); // email, primary_contact, group
                    $email = $row_data[0];
                    $users_id = $row_data[1];
                    $group_id = $row_data[2];

                    $link = "http://intranet-app.test/nor/invite?user=".base64_encode($email)."&group=". base64_encode($group_id)."&admin=". base64_encode($users_id);
                    // $email_body = "Dear user please click this link ". $link ." to create account on Intranet air";

                    $data = [
                        'to' => $email,
                        'from' => 'ashikur@getonnet.agency',
                        'subject' => 'Please confirm your invitation',
                        'title' => 'Intranet air invitation',
                        "body"     => $link
                    ];
                    $this->toEmail = $email;

                    Mail::send('email.invitation', compact('data'), function ($message) {
                        $message->subject('Please confirm your invitation');
                        $message->from(' velkomen@air.no', 'Intraner Air');
                        $message->to($this->toEmail);
                    });
                }
            }

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Successfully send.', 'alert' => 'alert-success']);
    }


    public function invite_exist(){
        $group = Group::orderBy('name')->get();
        $invited_user = User::orderBy('name')->whereIn('role', ['admin','superadmin'])->get();//Filter primary contact who are admin or super admin
        $guest_user = User::whereNull('group_id')->where('role', 'user')->orderBy('id', 'DESC')->get();//User select which is not linkup with group
        return view('backend.creation.invite_exist')->with(['guest_user' => $guest_user, 'invited_user' => $invited_user,  'group' => $group]);
    }

    public function save_invite_exist(Request $request){

        $validator = Validator::make($request->all(), [
            'invite_user_id' => 'required|array',
            'users_id' => 'required|numeric',
            'group_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try{

            if (isset($request->invite_user_id)){
                $invite_user_id = $request->invite_user_id;

                foreach ($invite_user_id as $rows){
                    $user = User::find($rows);
                    $user->group_id = $request->group_id;
                    $user->primary_contact = $request->users_id;
                    $user->save();
                }
            }

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'Updated successfully.', 'alert' => 'alert-success']);
    }*/

}

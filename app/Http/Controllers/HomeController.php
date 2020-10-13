<?php

namespace App\Http\Controllers;

use App\Board;
use App\Group as Group;
use App\GroupAdmin;
use App\GroupGroupAdmin;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use UploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id    = auth()->user()->id;
        // $cards = User::find( $id )->cards()->get();
        $group = auth()->user()->group;
         $cards = [];

        if( $group != Null ) {
            $today     = Carbon::now();
            $todayDate = $today->toDateString();

            if( $todayDate >= $group->start_date &&  $todayDate <= $group->end_date ) {
                $cards = User::find( $id )->cards()->ViewType('under')->Visible(true)->get();
            } elseif( $todayDate >= $group->archive_start_date &&  $todayDate < $group->start_date ) {
                $cards = User::find( $id )->cards()->ViewType('before')->Visible(true)->get();
            } elseif( $todayDate <= $group->archive_end_date &&  $todayDate > $group->end_date ) {
                $cards = User::find( $id )->cards()->ViewType('after')->Visible(true)->get();
            }
        } else {
            $cards = [];
        }

       // dd($cards);

        return view( 'home', compact('cards', 'group') );
    }

    public function invite_users()
    {
        return view('admin.invite-users');
    }


    /**
     * Created by nazmul
     */
    public function creation(){
        $board = Board::orderBy('name')->get();
        return view('creation')->with(['board' => $board]);
    }

    public function creation_save(Request $request){

        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4|max:191',
            'group_color' => 'required|string',
            'start_date' => 'date|required',
            'end_date' => 'date|required',
            'archive_start_date' => 'date|nullable',
            'archive_end_date' => 'date|nullable',
            'board_name' => 'required|string',
            'admin_name' => 'required|string',
            'email' => 'required|email',
            'invite_user_email' => 'email|nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try{

            /**
             * Create Group
             */
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
            $group_id = $group->id;
            /**
             * /Create Group
             */

            /**
             * Create Board
             */
            $board = new Board();
            $board->name = $request->board_name;
            $board->group_id = $group_id;
            $board->save();
            /**
             * /Create Board
             */

            /**
             * Create Group Admin
             */
            $group_admin = new GroupAdmin();
            $group_admin->name = $request->admin_name;
            $group_admin->email = $request->email;
            $group_admin->phone = $request->phone ?? '';
            $group_admin->bio = $request->bio ?? '';

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
                $group_admin->avatar = $filePath;
            }
            $group_admin->save();

            $group_admin_id = $group_admin->id;

            /**
             * /Create Group Admin
             */

            /**
             * Assign Group Admin
             */

              $assign_admin = new GroupGroupAdmin();
              $assign_admin->group_id = $group_id;
              $assign_admin->group_admin_id = $group_admin_id;
              $assign_admin->save();

            /**
             * /Assign Group Admin
             */


            /**
             * Send Invitation
             */

            $link = "http://intranet-app.test/nor/invite?user=".base64_encode( $request->invite_user_email )."&group=". base64_encode($group_id);
            $email_body = "Dear user please click this link ". $link ." to create account on Intranet air";

            $data = [
                'to' => $request->invite_user_email,
                'from' => 'ashikur@getonnet.agency',
                'subject' => 'Please confirm your invitation',
                'title' => 'Intranet air invitation',
                "body"     => $email_body
            ];
            $this->toEmail = $request->invite_user_email;

            Mail::send('email.invitation', compact('data'), function ($message) {
                $message->from('admin@intranet.air', 'Intraner Air');
                $message->to($this->toEmail);
            });

            /**
             * /Send Invitation
             */

            DB::commit();
        }catch (\Exception $ex) {
            //dd($ex);
            DB::rollback();
            return redirect()->back()->with(['status' => 'Some Thing error.', 'alert' => 'alert-danger']);
        }
        return redirect()->back()->with(['status' => 'created successfully.', 'alert' => 'alert-success']);
    }

    /**
     * Created by nazmul
     */
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
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
        return view('creation');
    }

    /**
     * Created by nazmul
     */
}

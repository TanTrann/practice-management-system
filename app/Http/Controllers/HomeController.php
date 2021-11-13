<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{   
    public function index(){
        return view('pages.home');
    }

    public function my_calendar(){
        $get_user_id = Session::get('user_id');
        $get_user_name = DB::table('tbl_user')->where('user_id',$get_user_id)->get();
        $all_cal = DB::table('tbl_nhomhp')->where('user_id',$get_user_id)->get();
        $manager_calendar = view('pages.mycalendar')->with('all_cal',$all_cal)->with('get_user_name',$get_user_name);

        return view('welcome')->with('manager_calendar',$manager_calendar);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function all_user(){
        $all_user= DB::table('tbl_user')->join('tbl_chucvu','tbl_chucvu.chucvu_id','=','tbl_user.id_chucvu')->get();
        $manager = view('admin.user.all_user')->with('all_user',$all_user)->with('all_user',$all_user);
        return view ('admin_layout')->with('admin.software.all_software',$manager);
   }
}

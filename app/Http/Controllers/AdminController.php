<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Requests;
use App\Models\Computer;
use App\Models\Room;
use App\Models\Software;
use Illuminate\Support\Facades\Session;
use Illuminate\support\facades\redirect;
session_start();

class AdminController extends Controller
{
	// public function AuthLogin(){
 //        $user_id = Session::get('user_id');
 //        if($user_id){
 //            return Redirect('dashboard');
 //        }else{
 //            return Redirect('admin')->send();
 //        }
 //    }
    public function AuthLogin(){
        $user_id = Session::get('user_id');
        if($user_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }

    public function index(){
            	return view ('admin_login');
    }

    public function show_dashboard(){
    	 $this->AuthLogin();
         $count_room=Room::get()->count();
         $count_software=Software::get()->count();
         $count_pc=Computer::get()->count();
    	return view ('admin.dashboard')->with('count_room',$count_room)->with('count_software',$count_software)->with('count_pc',$count_pc);
    }
    
    public function dashboard(Request $request){
        $user_name = $request->user_name;
        $user_password = md5($request->user_password);

        $result = DB::table('tbl_user')->where('user_name',$user_name)->where('user_password',$user_password)->first();

       
        if ($result){
    		Session::put('user_name',$result->user_name);
    		Session::put('user_id',$result->user_id);
    		 return Redirect('/dashboard');
    	}else{
    		Session::put('message','Mật khẩu hoặc tài khoản không đúng.');
    		return redirect::to('/admin');
    	}

    }

    public function logout(){
        $this->AuthLogin();
        Session::put('user_name',null);
        Session::put('user_id',null);
        return Redirect('/admin');
    
    }
}

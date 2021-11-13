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
    $id_chucvu = Session::get('id_chucvu');
    if($user_id && $id_chucvu == 0){
        return Redirect('dashboard');
    }else{
        return Redirect('admin')->send();
    }
}
public function AuthLoginUser(){
    $user_id = Session::get('user_id');
    $id_chucvu = Session::get('id_chucvu');
    if($user_id && $id_chucvu == 1){
        return Redirect('trang-chu');
    }else{
        return Redirect('login-user')->send();
    }
}
    public function index(){
            	return view ('admin_login');
    }

    public function show_dashboard(){
    	 $this->AuthLogin();
         $count_room=Room::get()->count();
         $count_software=Software::get()->count();
         $count_pc=Room::get()->sum('pc_quantity');
    	return view ('admin.dashboard')->with('count_room',$count_room)->with('count_software',$count_software)->with('count_pc',$count_pc);
    }
    
    public function dashboard(Request $request){
        $id_user = $request->id_user;
        $user_password = md5($request->user_password);

        $result = DB::table('tbl_user')->where('id_user',$id_user)->where('user_password',$user_password)->where('id_chucvu',0)->first();

       
        if ($result){
    		Session::put('id_user',$result->id_user);
    		Session::put('user_id',$result->user_id);
            Session::put('user_name',$result->user_name);
            Session::put('id_chucvu',$result->id_chucvu);
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
        Session::put('id_chucvu',null);
        return Redirect('/admin');
    
    }
    
    public function logout_user(){
        
        Session::put('user_name',null);
        Session::put('user_id',null);
        Session::put('id_chucvu',null);
        return Redirect('/dang-nhap');
    
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Requests;
use App\Models\Room;
use App\Models\Software;
use Illuminate\Support\Facades\Session;
use Illuminate\support\facades\redirect;
session_start();

class AdminController extends Controller
{
	// public function AuthLogin(){
 //        $admin_id = Session::get('admin_id');
 //        if($admin_id){
 //            return Redirect('dashboard');
 //        }else{
 //            return Redirect('admin')->send();
 //        }
 //    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
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
    	return view ('admin.dashboard')->with('count_room',$count_room)->with('count_software',$count_software);
    }
    
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

       
        if ($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		 return Redirect('/dashboard');
    	}else{
    		Session::put('message','Mật khẩu hoặc tài khoản không đúng.');
    		return redirect::to('/admin');
    	}

    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect('/admin');
    
    }
}

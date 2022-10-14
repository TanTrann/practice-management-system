<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\Roles;
use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function AuthLogin(){
        $user_id = Session::get('user_id');
        $id_chucvu = Session::get('id_chucvu');
        if($user_id && $id_chucvu <> 1){
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
            return Redirect('dang-nhap')->send();
        }
    }

    public function all_user()
    {
        $this->AuthLogin();
        $all_user= DB::table('tbl_user')->join('tbl_chucvu','tbl_chucvu.chucvu_id','=','tbl_user.id_chucvu')->get();
        $all_thanhpho = DB::table('tbl_tinhthanhpho')->get();
        $all_khoa = DB::table('tbl_khoa')->get();
        $all_cv= DB::table('tbl_chucvu')->get();
        $manager = view('admin.user.all_user')->with('all_cv',$all_cv)->with('all_khoa',$all_khoa)->with('all_thanhpho',$all_thanhpho)->with('all_user',$all_user);
        return view ('admin_layout')->with('admin.software.all_software',$manager);
    }

    public function show_edit_user (Request $request){
        $this->AuthLogin();
        $user_id = $request->user_id;
        $user = Users::find($user_id);
        $output['user_name'] = $user->user_name;
        $output['user_id'] = $user->user_id;
        $output['id_user'] = $user->id_user;
        $output['user_address'] = $user->user_address;
        $output['khoa'] = $user->khoa;
        $output['user_phone'] = $user->user_phone;
        $output['user_name'] = $user->user_name;
        $output['user_email'] = $user->user_email;

        echo json_encode($output);   
    }

    public function update_user(Request $Request){
        $this->AuthLogin();
        $data =  array();
        $user_id=$Request->user_id;
        $data['user_name']= $Request->user_name;
        $data['id_user']= $Request->id_user;
        $data['user_address']= $Request->user_address;
        $data['khoa'] = $Request->khoa;
        $data['user_phone']= $Request->user_phone;
        $data['user_email']= $Request->user_email;
        DB::table('tbl_user')->where('user_id', $user_id)->update($data);
        Session::put('message','Cập nhật tài khoản thành công');
        return Redirect()->back();
    }
    public function update_pass_user(Request $Request){
        $this->AuthLogin();
        $data =  array();
        $data2 =  array();
        $user_id=$Request->user_id;
        $data['user_password']= $Request->repass;
        $data['user_password2']= $Request->pass;
        if($data['user_password'] == $data['user_password2']){
           
            $data2['user_password']= md5($Request->pass);
         
           
            DB::table('tbl_user')->where('user_id', $user_id)->update($data2);
            Session::put('message','Cập nhật mật khẩu thành công');
        }else{
            Session::put('message','Mật khẩu chưa trùng khớp');
        }
        
        return Redirect()->back();
    }
    public function delete_user($user_id){
        $this->AuthLogin();
       
        DB::table('tbl_user')->where('user_id',$user_id)->delete();
        Session::put('message','Xóa tài khoản thành công');
        return Redirect()->back();
    }

    public function insert_user(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['user_name']= $request->user_name;
        $data['user_address']= $request->user_address;
        $data['user_email']= $request->user_email;
        $data['user_phone']= $request->user_phone;
        $data['khoa'] = $request->khoa;
        $data['user_password']= md5($request->user_password);
        $data['id_user']= $request->id_user;
        $data['id_chucvu']= $request->id_chucvu;

        
        DB::table('tbl_user')->insert($data); 
        Session::put('message','Thêm tài khoản thành công');
        return Redirect()->back();   
    }

    //KHOA========================================================================================
    public function all_khoa()
    {
        $this->AuthLogin();
        $all_khoa= DB::table('tbl_khoa')->get();

        $all_user= DB::table('tbl_user')->join('tbl_chucvu','tbl_chucvu.chucvu_id','=','tbl_user.id_chucvu')->get();
     
        $manager = view('admin.khoa.all_khoa')->with('all_user',$all_user)->with('all_khoa',$all_khoa)->with('all_khoa',$all_khoa);
        return view ('admin_layout')->with('admin.software.all_software',$manager);
    }
    public function insert_khoa(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['ma_khoa']= $request->ma_khoa;
        $data['ten_khoa']= $request->ten_khoa;
        DB::table('tbl_khoa')->insert($data); 
        Session::put('message','Thêm khoa thành công');
        return Redirect()->back();   
    }
    public function show_edit_khoa (Request $request){
        $this->AuthLogin();
        $khoa_id = $request->khoa_id;
        $khoa = Khoa::find($khoa_id);
        $output['khoa_id'] = $khoa->khoa_id;
        $output['ma_khoa'] = $khoa->ma_khoa;
        $output['ten_khoa'] = $khoa->ten_khoa;
        echo json_encode($output);   
    }
    public function update_khoa(Request $Request){
        $this->AuthLogin();
        $data =  array();
        $khoa_id=$Request->khoa_id;
        $data['khoa_id']= $Request->khoa_id;
        $data['ma_khoa']= $Request->ma_khoa;
        $data['ten_khoa']= $Request->ten_khoa;
       
        DB::table('tbl_khoa')->where('khoa_id', $khoa_id)->update($data);
        Session::put('message','Cập nhật khoa thành công');
        return Redirect()->back();
    }
    public function delete_khoa($khoa_id){
        $this->AuthLogin();
       
        DB::table('tbl_khoa')->where('khoa_id',$khoa_id)->delete();
        Session::put('message','Xóa khoa thành công');
        return Redirect()->back();
    }

    //front end =================================================================================
    public function trang_chu(){
        $this->AuthLoginUser();
        $user_id = Session::get('user_id');
        $in4  = Users::where('user_id', $user_id)->get();
        return view('pages.menu')->with('in4',$in4 );

    }
    public function dang_nhap(){
        return view('pages.home');
    }

    public function login_user (Request $request){
        

        $id_user = $request->id_user ;
        $user_password = md5($request->user_password);

        $result = DB::table('tbl_user')->where('id_user',$id_user)->where('user_password',$user_password)->where('id_chucvu',1)->first();

       
        if ($result){
    		Session::put('user_name',$result->user_name);
    		Session::put('user_id',$result->user_id);
            Session::put('id_chucvu',$result->id_chucvu);
    		 return Redirect('/trang-chu');
    	}else{
    		Session::put('message','Mật khẩu hoặc tài khoản không đúng.');
            return Redirect()->back();   
    	}

    }

   


}

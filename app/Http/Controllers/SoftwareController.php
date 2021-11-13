<?php

namespace App\Http\Controllers;

use App\Models\RoomDetails;
use App\Models\Software;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Version;

class SoftwareController extends Controller
{
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

    public function all_software(){
        $this->AuthLogin();
        $all_software = DB::table('tbl_software')->orderBy('software_id','DESC')->get();
        $all_version = DB::table('tbl_version')->join('tbl_software','tbl_version.software_id','=','tbl_software.software_id')->orderBy('version_id','desc')->get();
         $manager_software = view('admin.software.all_software')->with('all_software',$all_software)->with('all_version',$all_version);
        return view ('admin_layout')->with('admin.software.all_software',$manager_software);
    }

    public function save_software(Request $Request){
        $this->AuthLogin();
        $data =  array();
        $data['software_name']= $Request->software_name;
        DB::table('tbl_software')->insert($data);
        Session::put('message','Thêm phần mềm thành công');
        return Redirect()->back();
    }

    public function delete_software($software_id){
        $this->AuthLogin();
        $soft = DB::table('tbl_version')->where('software_id',$software_id)->get()->first();
       
        $id = $soft->version_id;
        DB::table('tbl_room_details')->where('version_id',$id)->delete();
        
        DB::table('tbl_software')->where('software_id',$software_id)->delete();
        DB::table('tbl_version')->where('software_id',$software_id)->delete();
        Session::put('message','Xóa phần mềm thành công');
        return Redirect('all-software');
    }

    public function edit_software($software_id){
        $this->AuthLogin();
        $edit_software = DB::table('tbl_software')->where('software_id',$software_id)->get();
        $manager_software = view('admin.software.all_software')->with('edit_software',$edit_software);
        return view ('admin_layout')->with('admin.software.all_software',$manager_software);
    
    }

    public function update_software(Request $Request){
        $data =  array();
        $software_id=$Request->software_id;
        $data['software_name']= $Request->software_name;
        DB::table('tbl_software')->where('software_id', $software_id)->update($data);
        Session::put('message','Cập nhật phần mềm thành công');
        return Redirect()->back();
    }

    public function add_ver_software(Request $Request){
        $this->AuthLogin();
        $data =  array();
        $data['software_id']= $Request->software_id;
        $data['version_number']= $Request->version_number;
        DB::table('tbl_version')->insert($data);
        Session::put('message','Thêm phiên bản thành công');
        return Redirect()->back();
    }

    public function show_edit_software (Request $request){
        $software_id = $request->software_id;
        $software = Software::find($software_id);
        $output['software_name'] = $software->software_name;
        $output['software_id'] = $software->software_id;      
        echo json_encode($output);
    }

    public function add_version_software (Request $request){
        $software_id = $request->software_id;
        $software = Software::find($software_id);
        $output['software_name'] = $software->software_name;
        $output['software_id'] = $software->software_id;      
        echo json_encode($output);
    }

    public function delete_version($version_id){
        $this->AuthLogin();
        Version::where('version_id',$version_id)->delete();
        RoomDetails::where('version_id',$version_id)->delete();
        Session::put('message','Xóa phiên bản thành công');
        return Redirect()->back();
    }
    public function software_detail($software_id){
        $this->AuthLogin(); 
        $all_version = DB::table('tbl_version')->join('tbl_software','tbl_version.software_id','=','tbl_software.software_id')->orderBy('version_id','desc')->get();
        
        $all_software = DB::table('tbl_software')->orderBy('software_id','DESC')->get();
        $detail_software = DB::table('tbl_software')->where('software_id',$software_id)->orderby('software_id','DESC')->get();
        $detail_ver = DB::table('tbl_version')->where('software_id',$software_id)->orderby('version_number','DESC')->get();
        $manager_software = view('admin.software.software_detail')->with('detail_software',$detail_software)->with('detail_ver',$detail_ver)->with('all_software',$all_software)->with('all_version',$all_version);
        return view ('admin_layout')->with('admin.software.software_detail',$manager_software);
    }
   
   
    

    
    
    
    

}

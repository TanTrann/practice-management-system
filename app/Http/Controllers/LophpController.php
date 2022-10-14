<?php

namespace App\Http\Controllers;

use App\Models\Dkiphong;
use App\Models\lophp;
use App\Models\nhomth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LophpController extends Controller
{
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
            return Redirect('login-user')->send();
        }
    } 
    
    
    public function select_lophp(Request $request){
        $data = $request->all();
        if($data['action']){
          $output = '';
          if($data['action']=="mahp_lophp"){
            $select_lophp = lophp::where('mahp',$data['ma_id'])->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_lophp.namhoc_lophp')->join('tbl_thu','tbl_thu.id_thu','=','tbl_lophp.thu_lophp')->join('tbl_user','tbl_user.user_id','=','tbl_lophp.macb_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_lophp.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_lophp.hocky_lophp')->get();
          
            foreach($select_lophp as $key => $lophp){
              $output.='<option value="'.$lophp->namhoc_id.'">'.$lophp->namhoc.'</option>';
            }

           
          }else{
           
           
            
          }
          echo $output;
        }
    }
    public function delete_lophp ($sttlophp){
      $this->AuthLogin();
     
     $get_nhom_id = nhomth::where('sttlophp',$sttlophp)->get();
     foreach ($get_nhom_id as $key => $id){
       $get_id = $id -> nhom_id;
      Dkiphong::where('nhom_id',$get_id)->delete();
     }
      nhomth::where('sttlophp',$sttlophp)->delete();  
      lophp::where('sttlophp',$sttlophp)->delete();
      Session::put('message','Xóa lớp học phần thành công');
      return Redirect()->back();
  }

  public function insert_lophp(Request $request){

   
    $this->AuthLogin();
    
    $data= array();
    $data['hocky_lophp']= $request->hocky_lophp;
    $data['namhoc_lophp']= $request->namhoc_lophp;
    $data['mahp_lophp']= $request->mahp_lophp;
    $data['tietbd_lophp']= $request->tietbd_lophp;
    $data['sotiet_lophp']= $request->sotiet_lophp;
    $data['thu_lophp']= $request->thu_lophp;
    $data['macb_lophp']= $request->macb_lophp;
    
    $data['status_lophp']= $request->status_lophp;
    DB::table('tbl_lophp')->insert($data);
    Session::put('message','Thêm lớp học phần thành công');
    return Redirect()->back();
    
}

public function update_lophp(Request $request){
    $this->AuthLogin();
    $data= array();
    $sttlophp=$request->sttlophp;
    
    $data['hocky_lophp']= $request->hocky_lophp;
    $data['namhoc_lophp']= $request->namhoc_lophp;
    $data['mahp_lophp']= $request->mahp_lophp;
    $data['tietbd_lophp']= $request->tietbd_lophp;
    $data['sotiet_lophp']= $request->sotiet_lophp;
    $data['thu_lophp']= $request->thu_lophp;
    $data['macb_lophp']= $request->macb_lophp;
    $data['status_lophp']= $request->status_lophp;
    $data2 = array();
    $data2['hocky_lophp']= $request->hocky_lophp;
    $data2['namhoc_lophp']= $request->namhoc_lophp;
    $data2['mahp_lophp']= $request->mahp_lophp;   
    $data2['tietbd_lophp']= $request->tietbd_lophp;
    $data2['sotiet_lophp']= $request->sotiet_lophp;

   
    DB::table('tbl_lophp')->where('sttlophp',$sttlophp)->update($data); 
    DB::table('tbl_nhomth')->where('sttlophp',$sttlophp)->update($data2); 
    
    
    Session::put('message','Cập nhật lớp học phần thành công');
    return Redirect()->back();   
}


   
  
}

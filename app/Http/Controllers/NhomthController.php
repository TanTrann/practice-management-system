<?php

namespace App\Http\Controllers;

use App\Models\Buoi;
use App\Models\Dkiphong;
use App\Models\hocphan;
use App\Models\lophp;
use App\Models\nhomth;
use App\Models\Room;
use App\Models\Thu;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NhomthController extends Controller
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
    public function dangki_nhomth(){
        $this->AuthLoginUser();
        $user_id = Session::get('user_id');
        $all_namhoc = DB::table('tbl_namhoc')->get();
     
        $all_lophp2 = DB::table('tbl_lophp')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_lophp.namhoc_lophp')->join('tbl_thu','tbl_thu.id_thu','=','tbl_lophp.thu_lophp')->join('tbl_user','tbl_user.user_id','=','tbl_lophp.macb_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_lophp.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_lophp.hocky_lophp')->where('user_id',$user_id)->get();

        $all_lophp = DB::table('tbl_lophp')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_lophp.namhoc_lophp')->join('tbl_thu','tbl_thu.id_thu','=','tbl_lophp.thu_lophp')->join('tbl_user','tbl_user.user_id','=','tbl_lophp.macb_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_lophp.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_lophp.hocky_lophp')->where('user_id',$user_id)->get();
        $all_hocky = DB::table('tbl_hocky')->get();
        $all_thu = DB::table('tbl_thu')->get();  
        $all_hocphan = DB::table('tbl_hocphan')->get();
        $all_user = DB::table('tbl_user')->where('id_chucvu',1)->get();
        $all_software = DB::table('tbl_software')->orderBy('software_id','DESC')->get();
      
        $all_nhomth =nhomth::get();
        $manager_schedule = view('pages.dkinhomth')->with('all_nhomth',$all_nhomth)->with('all_lophp2',$all_lophp2)->with('all_software',$all_software)->with('all_namhoc',$all_namhoc)->with('all_lophp',$all_lophp)->with('all_hocky',$all_hocky)->with('all_hocphan',$all_hocphan)->with('all_user',$all_user)->with('all_thu',$all_thu);
       
        return view ('welcome')->with('pages.dkinhomth',$manager_schedule);
    }
    public function insert_nhomth(Request $request){
        
        $data =  array();
        
        
        $data['sttlophp']= $request->sttlophp;
        $all_sttlophp = lophp::where('sttlophp',$data['sttlophp'])->get();
        foreach($all_sttlophp as $key => $stt){
            $data['mahp_lophp'] = $stt->mahp_lophp;
            $data['namhoc_lophp'] = $stt->namhoc_lophp;
            $data['hocky_lophp'] = $stt->hocky_lophp;
            $data['tietbd_lophp'] = $stt->tietbd_lophp;
            $data['sotiet_lophp'] = $stt->sotiet_lophp;
            $data['soluong']= $request->soluong;
            $data['ycpm'] = $request->ycpm;
            $data['check_dki'] = $request->check_dki;
            DB::table('tbl_nhomth')->insert($data);
            DB::table('tbl_lophp')->where('sttlophp',$data['sttlophp'])->update(['status_lophp'=>1]); 
        }       
       
     
  
    Session::put('message','Đăng ký nhóm thực hành thành công');
    return Redirect()->back(); 
  
    
  }

  public function show_edit_nhomth (Request $request){
    $sttlophp = $request->sttlophp;
    $sttlophp = lophp::find($sttlophp);
    $sttlophp2 = nhomth::find($sttlophp);
    $output['sttlophp'] = $sttlophp->sttlophp;
    $output['hocky_lophp'] = $sttlophp->hocky_lophp;
    $output['namhoc_lophp'] = $sttlophp->namhoc_lophp;
    $output['mahp_lophp'] = $sttlophp->mahp_lophp;
    $output['tietbd_lophp'] = $sttlophp->tietbd_lophp;
    $output['sotiet_lophp'] = $sttlophp->sotiet_lophp;
    $output['thu_lophp'] = $sttlophp->thu_lophp;
    $output['macb_lophp'] = $sttlophp->macb_lophp;
    
    
    echo json_encode($output);   
}
public function chitiet_nhomth($sttlophp){
    $this->AuthLoginUser();
    $user_id = Session::get('user_id');
        $all_namhoc = DB::table('tbl_namhoc')->get();
     
        $all_lophp2 = DB::table('tbl_lophp')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_lophp.namhoc_lophp')->join('tbl_thu','tbl_thu.id_thu','=','tbl_lophp.thu_lophp')->join('tbl_user','tbl_user.user_id','=','tbl_lophp.macb_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_lophp.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_lophp.hocky_lophp')->where('user_id',$user_id)->get();

        $all_lophp = DB::table('tbl_lophp')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_lophp.namhoc_lophp')->join('tbl_thu','tbl_thu.id_thu','=','tbl_lophp.thu_lophp')->join('tbl_user','tbl_user.user_id','=','tbl_lophp.macb_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_lophp.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_lophp.hocky_lophp')->where('user_id',$user_id)->get();
        $all_hocky = DB::table('tbl_hocky')->get();
        $all_thu = DB::table('tbl_thu')->get();  
        $all_hocphan = DB::table('tbl_hocphan')->get();
        $all_user = DB::table('tbl_user')->where('id_chucvu',1)->get();
        $all_software = DB::table('tbl_software')->orderBy('software_id','DESC')->get();
      
        $all_nhomth =nhomth::join('tbl_room','tbl_room.room_id','=','tbl_nhomth.sttphong')->get();
    $nhomtho = DB::table('tbl_lophp')->where('sttlophp',$sttlophp)->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_lophp.mahp_lophp')->get();

    $nhomth = DB::table('tbl_nhomth')->where('sttlophp',$sttlophp)->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_nhomth.namhoc_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_nhomth.hocky_lophp')->join('tbl_software','tbl_software.software_id','=','tbl_nhomth.ycpm')   ->get();

    $count_nhomth = DB::table('tbl_nhomth')->where('sttlophp',$sttlophp)->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_nhomth.namhoc_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_nhomth.hocky_lophp')->join('tbl_software','tbl_software.software_id','=','tbl_nhomth.ycpm')->count();
    $lk_tuan= Dkiphong::join('tbl_nhomth','tbl_nhomth.nhom_id','=','tbl_dki_phong.nhom_id')->join('tbl_detail_semester','tbl_detail_semester.detail_semester_id','=','tbl_dki_phong.detail_semester_id')->join('tbl_tuan','tbl_tuan.tuan','=','tbl_detail_semester.week')->get();

   $manager_product  = view('pages.chitiet_nhomth')->with('nhomtho',$nhomtho)->with('count_nhomth',$count_nhomth)->with('lk_tuan',$lk_tuan)->with('nhomth',$nhomth)->with('all_nhomth',$all_nhomth)->with('all_lophp2',$all_lophp2)->with('all_software',$all_software)->with('all_namhoc',$all_namhoc)->with('all_lophp',$all_lophp)->with('all_hocky',$all_hocky)->with('all_hocphan',$all_hocphan)->with('all_user',$all_user)->with('all_thu',$all_thu);

   return view('welcome')->with('pages.chitiet_nhomth', $manager_product);
}
public function chitiet_nhomth_admin($sttlophp){
    $this->AuthLogin();
   
    $all_hocphan=hocphan::get();
    $all_subject = DB::table('tbl_subject')->get();
  

    $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
    $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
    $all_hoc_ky = DB::table('tbl_hocky')->get();
    $all_namhoc = DB::table('tbl_namhoc')->get();
   
    $all_nhomth2= DB::table('tbl_nhomth')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_nhomth.namhoc_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_nhomth.hocky_lophp')->join('tbl_room','tbl_room.room_id','=','tbl_nhomth.sttphong')->get();
    $all_nhomth= DB::table('tbl_nhomth')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_nhomth.namhoc_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_nhomth.hocky_lophp')->get();
    $nhomth = DB::table('tbl_nhomth')->where('sttlophp',$sttlophp)->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_nhomth.namhoc_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_nhomth.hocky_lophp')->join('tbl_software','tbl_software.software_id','=','tbl_nhomth.ycpm')->get();
    $all_buoi= Buoi::get();
    $all_thu= Thu::get();
    foreach($nhomth as $key => $val){
        $check_ycpm= $val -> ycpm;
        $check_soluong= $val -> soluong;
    }
    $lk_tuan= Dkiphong::join('tbl_nhomth','tbl_nhomth.nhom_id','=','tbl_dki_phong.nhom_id')->join('tbl_detail_semester','tbl_detail_semester.detail_semester_id','=','tbl_dki_phong.detail_semester_id')->join('tbl_tuan','tbl_tuan.tuan','=','tbl_detail_semester.week')->join('tbl_room','tbl_room.room_id','=','tbl_dki_phong.room_id')->get();
    $lk_phong = nhomth::join('tbl_dki_phong','tbl_dki_phong.nhom_id','=','tbl_nhomth.nhom_id')->join('tbl_room','tbl_room.room_id','=','tbl_dki_phong.room_id')->get();
    $room=Room::get();
    $all_room= Room::join('tbl_room_details','tbl_room_details.room_id','=','tbl_room.room_id')->where('pc_quantity','>=',$check_soluong)->where('software_id',$check_ycpm)->get();
    $tuan = DB::table('tbl_detail_semester')->get();
   $manager_product  = view('admin.nhomth.chitiet_nhomth_admin')->with('all_nhomth2',$all_nhomth2)->with('room',$room)->with('lk_phong',$lk_phong)->with('lk_tuan',$lk_tuan)->with('all_room',$all_room)->with('all_nhomth',$all_nhomth)->with('all_thu',$all_thu)->with('all_buoi',$all_buoi)->with('tuan',$tuan)->with('all_namhoc',$all_namhoc)->with('all_hoc_ky',$all_hoc_ky)->with('hoc_ki',$hoc_ki)->with('all_week',$all_week)->with('all_subject',$all_subject)->with('all_hocphan',$all_hocphan)->with('all_hocphan',$all_hocphan)->with('nhomth',$nhomth);

   return view('admin_layout')->with('admin.nhomth.chitiet_nhomth_admin ', $manager_product);
}
public function delete_nhomth($nhom_id){
    $this->AuthLoginUser();
   
    $check_nhomth =nhomth::where('nhom_id',$nhom_id)->get();
    foreach ($check_nhomth as $key => $check){
        $check_sttlophp = $check -> sttlophp;
        $count_nhomth = nhomth::where('sttlophp',$check_sttlophp)->count();
        $check_nhomth = nhomth::where('sttlophp',$check_sttlophp)->get();
        if ($count_nhomth == 1 ){

            lophp::where('sttlophp',$check_sttlophp)->update(['status_lophp'=>0]);
            nhomth::where('nhom_id',$nhom_id)->delete();
        }else{
            nhomth::where('nhom_id',$nhom_id)->delete();
        }
        
    }
   
    Session::put('message','Xóa nhóm thực hành thành công');
            return Redirect()->back();
}

public function huy_dki_nhom($nhom_id){
    $this->AuthLogin();
    
   Dkiphong::where('nhom_id',$nhom_id)->delete();
   nhomth::where('nhom_id',$nhom_id)->update(['check_dki'=>0]);
   nhomth::where('nhom_id',$nhom_id)->update(['sttphong'=>NULL]);
       
    Session::put('message','Hủy đăng ký thành công');
            return Redirect()->back();
}
public function manage_nhomth(){
    $this->AuthLogin();
     $all_hocphan=hocphan::get();
    $all_subject = DB::table('tbl_subject')->get();
  

    $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
    $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
    $all_hoc_ky = DB::table('tbl_hocky')->get();
    $all_namhoc = DB::table('tbl_namhoc')->get();
   
    $all_nhomth= DB::table('tbl_nhomth')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_nhomth.namhoc_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_nhomth.hocky_lophp')->join('tbl_software','tbl_software.software_id','=','tbl_nhomth.ycpm')->get();
    $all_nhom=DB::table('tbl_nhomth')->join('tbl_room','tbl_room.room_id','=','tbl_nhomth.sttphong')->get();
    $all_buoi= Buoi::get();
    $all_thu= Thu::get();
    foreach($all_nhomth as $key => $val){
        $check_ycpm= $val -> ycpm;
        $check_soluong= $val -> soluong;
    }
    
    $all_room= Room::join('tbl_room_details','tbl_room_details.room_id','=','tbl_room.room_id')->where('pc_quantity','>=',$check_soluong)->where('software_id',$check_ycpm)->get();

    $tuan = DB::table('tbl_detail_semester')->get();
    $lk_tuan= Dkiphong::join('tbl_nhomth','tbl_nhomth.nhom_id','=','tbl_dki_phong.nhom_id')->join('tbl_detail_semester','tbl_detail_semester.detail_semester_id','=','tbl_dki_phong.detail_semester_id')->join('tbl_tuan','tbl_tuan.tuan','=','tbl_detail_semester.week')->get();

    $manager_semester = view('admin.nhomth.manage_nhomth')->with('all_nhom',$all_nhom)->with('lk_tuan',$lk_tuan)->with('all_room',$all_room)->with('tuan',$tuan)->with('all_subject',$all_subject)->with('hoc_ki',$hoc_ki)->with('all_hoc_ky',$all_hoc_ky)->with('all_namhoc',$all_namhoc)->with('all_nhomth',$all_nhomth)->with('all_buoi',$all_buoi)->with('all_week',$all_week)->with('all_thu',$all_thu)->with('all_hocphan',$all_hocphan)->with('all_nhomth',$all_nhomth);
    return view ('admin_layout')->with('admin.nhomth.manage_nhomth',$manager_semester);
}
public function show_dki_lich (Request $request){
    $nhom_id = $request->nhom_id;
    $nhom_id = nhomth::find($nhom_id);
  
    $output['nhom_id'] = $nhom_id->nhom_id;
    $output['sttlophp'] = $nhom_id->sttlophp;
    $output['mahp_lophp'] = $nhom_id->mahp_lophp;
    $output['namhoc_lophp'] = $nhom_id->namhoc_lophp;
    $output['hocky_lophp'] = $nhom_id->hocky_lophp;
    $output['tietbd_lophp'] = $nhom_id->tietbd_lophp;
    $output['sotiet_lophp'] = $nhom_id->sotiet_lophp;
    $output['macb_lophp'] = $nhom_id->macb_lophp;
    $thu = lophp::find( $output['sttlophp']);
    $output['thu'] = $thu->thu_lophp;

    $nhom_id2 = $request->nhom_id;
    $nhom_id = nhomth::find($nhom_id2);
    $output['nhom_id2'] = $nhom_id->nhom_id;
    $output['sttlophp2'] = $nhom_id->sttlophp;
    $output['mahp_lophp2'] = $nhom_id->mahp_lophp;
    $output['namhoc_lophp2'] = $nhom_id->namhoc_lophp;
    $output['hocky_lophp2'] = $nhom_id->hocky_lophp;
    $output['tietbd_lophp2'] = $nhom_id->tietbd_lophp;
    $output['sotiet_lophp2'] = $nhom_id->sotiet_lophp;
    $output['macb_lophp2'] = $nhom_id->macb_lophp;
    $thu = lophp::find( $output['sttlophp2']);
    $output['thu2'] = $thu->thu_lophp;
    echo json_encode($output);   
}
}
